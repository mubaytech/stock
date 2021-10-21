<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingUserTable extends Migration
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
        $this->schema->dropIfExists('setting_user');
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
        $this->schema->create('setting_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setting_id')->constrained('settings');
            $table->foreignId('user_id')->constrained('users');
            $table->json('value');
            $table->timestamps();
        });
    }

}
