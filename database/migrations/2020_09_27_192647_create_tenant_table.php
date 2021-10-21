<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('logo_id')->nullable()->constrained('files');
            $table->string('slug', 100)->unique();
            $table->string('display', 100)->index();
            $table->string('descri', 200);
            $table->string('tel1', 30);
            $table->string('tel2', 30);
            $table->string('adresse', 100);
            $table->string('email', 60);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
