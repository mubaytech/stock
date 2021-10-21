<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
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
        $this->schema->create('clients', function (Blueprint $table) {

		$table->id();
		$table->foreignId('user_id')->nullable()->constrained();
		$table->foreignId('image_id')->nullable()->constrained('files');
		$table->enum('type',['CLIENT','FOURNISSEUR'])->index();
		$table->string('nom',120)->index();
		$table->string('email',100)->unique();
		$table->string('address_1',200);
		$table->string('contact_1',30)->unique();
		$table->string('contact_2',30)->nullable()->index();
		$table->timestampsTz();

        });
    }


}
