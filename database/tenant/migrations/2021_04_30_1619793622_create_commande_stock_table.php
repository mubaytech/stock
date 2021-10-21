<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeStockTable extends Migration
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
        $this->schema->create('commande_stock', function (Blueprint $table) {

            $table->id();
            $table->foreignId('commande_id')->constrained();
            $table->foreignId('stock_id')->constrained();
            $table->decimal('quantite',10,2)->index();
            $table->decimal('prix_achat_unitaire',10,2)->index();
            $table->decimal('prix_de_vente_unitaire',10,2)->index();
            $table->string('remise_description')->nullable();
            $table->string('taxe_description')->nullable();
            $table->timestampsTz();
            $table->softDeletesTz();

        });
    }


}
