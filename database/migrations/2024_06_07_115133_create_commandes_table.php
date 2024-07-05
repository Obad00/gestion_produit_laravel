<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('nom_client');
            $table->string('adresse_client');
            $table->string('telephone_client');
            $table->enum('statut', ['valide', 'annule', 'en cours'])->default('en cours');
            $table->decimal('montant', 10, 2)->default(0.00);
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_produit');
        Schema::dropIfExists('commandes');
    }
}
