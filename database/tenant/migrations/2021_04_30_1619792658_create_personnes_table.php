<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesTable extends Migration
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
        $this->schema->create('personnes', function (Blueprint $table) {

            $table->id();
            $table->foreignId('image_id')->nullable()->constrained('files');
            $table->foreignId('image_piece_identite_id')->nullable()->constrained('files');
            $table->foreignId('nationalite_id')->nullable()->constrained();
            $table->string('nom', 120)->index();
            $table->date('date_de_naiss')->nullable()->index();
            $table->string('cni', 30)->nullable()->unique();
            $table->string('contact_1', 20)->nullable()->unique();
            $table->enum('sexe', ['HOMME', 'FEMME'])->nullable()->index();
            $table->string('email', 60)->nullable()->unique();
            $table->string('contact_2', 20)->nullable()->nullable();
            $table->string('adresse_1', 200)->nullable();
            $table->string('adresse_2', 200)->nullable();
            $table->timestampsTz();
            $table->softDeletesTz();


        });
    }


}
