<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
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
        $this->schema->create('files', function (Blueprint $table) {

		$table->id();
		$table->string('nom',120)->nullable();
		$table->string('url',200)->nullable();
		$table->string('path',200)->nullable()->index();
		$table->string('thumbnail_url',200)->nullable();
		$table->string('thumbnail_path',200)->nullable();
		$table->string('type',100)->nullable()->index();
		$table->boolean('exist')->default(0)->index();
		$table->timestampsTz();

        });
    }

}
