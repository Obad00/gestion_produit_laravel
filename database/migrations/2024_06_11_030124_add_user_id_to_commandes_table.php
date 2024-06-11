<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
            // Vérifier si la colonne 'user_id' existe avant de tenter de la supprimer
            if (Schema::hasColumn('commandes', 'user_id')) {
                // Supprimer la contrainte de clé étrangère
                $table->dropForeign(['user_id']);
                // Supprimer la colonne 'user_id'
                $table->dropColumn('user_id');
            }
        });
    }
};
