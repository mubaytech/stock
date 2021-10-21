<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
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
        $this->schema->create('commandes', function (Blueprint $table) {

            $table->id();
            $table->foreignId('depot_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('client_id')->nullable()->constrained();
            $table->enum('type', ['VENTE', 'AQUISITION'])->nullable();
            $table->enum('etat', ['RECENT', 'USAGE'])->nullable();
            $table->timestampTz('age')->nullable()->index();
            $table->timestampTz('date_expiration')->nullable();
            $table->timestampTz('date')->index();
            $table->string('description')->nullable();
            $table->timestampsTz();
            $table->softDeletesTz();

        });
    }


}
