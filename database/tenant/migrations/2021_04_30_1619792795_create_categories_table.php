<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * The database schema.
     *
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    /**
     * Create a new migration instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->schema = Schema::connection($this->getConnection());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('categories');
        $this->schema->dropIfExists('categorie_closures');
    }

    /**
     * Get the migration connection name.
     *
     * @return string|null
     */
    public function getConnection()
    {
        return 'tenant';
    }


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('categories', function (Blueprint $table) {

            $table->id();
            $table->foreignId('categorie_id')->nullable()->constrained('categories');
            $table->foreignId('image_id')->nullable()->constrained('files');
            $table->bigInteger('position', false, true);
            $table->string('nom', 120);
            $table->string('slug', 120)->unique();
            $table->string('description', 200);
            $table->softDeletes();
            $table->timestampsTz();
//            ->onDelete('set null');

        });
        $this->schema->create('categorie_closures', function (Blueprint $table) {
            $table->id('closure_id');

            $table->foreignId('ancestor')->constrained('categories');
            $table->foreignId('descendant')->constrained('categories');
            $table->bigInteger('depth', false, true);


//                ->onDelete('cascade');

        });
    }


}
