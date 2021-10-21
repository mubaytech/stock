<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitesDeMesuresTable extends Migration
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
        $this->schema->dropIfExists('unites_de_mesures');
        $this->schema->dropIfExists('unites_de_mesure_closures');
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
        $this->schema->create('unites_de_mesures', function (Blueprint $table) {

            $table->id();
            $table->foreignId('unites_de_mesure_id')->nullable()->constrained();
            $table->bigInteger('position', false, true);
            $table->string('nom', 120);
            $table->string('slug', 100)->unique();
            $table->string('symbole', 8)->nullable()->index();
            $table->softDeletes();
            $table->timestampsTz();

        });
        $this->schema->create('unites_de_mesure_closures', function (Blueprint $table) {
            $table->id('closure_id');

            $table->foreignId('ancestor')->constrained('unites_de_mesures');
            $table->foreignId('descendant')->constrained('unites_de_mesures');
            $table->bigInteger('depth', false, true);


//                ->onDelete('cascade');

        });
    }

}
