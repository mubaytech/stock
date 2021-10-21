<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
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
        $this->schema->dropIfExists('stocks');
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
        $this->schema->create('stocks', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('categorie_id')->constrained('categorie_unites_de_mesure');
            $table->foreignId('image_id')->nullable()->constrained('files');
            $table->string('nom', 120);
            $table->string('slug', 120)->unique();
            $table->string('code_produit', 120)->nullable()->index();
            $table->decimal('prix_de_vente_unitaire', 10, 2)->index();
            $table->timestampsTz();

        });
    }


}
