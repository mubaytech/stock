<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepotsTable extends Migration
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
        $this->schema->dropIfExists('oauth_refresh_tokens');
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
        $this->schema->create('depots', function (Blueprint $table) {

            $table->id();
            $table->foreignId('image_id')->nullable()->constrained('files');
            $table->string('nom', 120);
            $table->string('slug', 120)->unique();
            $table->string('region', 100)->index();
            $table->string('ville', 100)->index();
            $table->string('adresse_1', 200)->index();
            $table->string('email', 100);
            $table->string('contact_1', 30)->unique();
            $table->string('contact_2', 30)->nullable()->index();
            $table->timestampsTz();


        });
    }


}
