<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('migrants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')
            ->constrained()
            ->onUpdate('restrict')
            ->onDelete('restrict');
            $table->string("nom_prnom");
            $table->string("natinalite");
            $table->string("date_naissance");
            $table->string("sexe");
            $table->string("adresse");
            $table->string("contact");
            $table->string("statut_migratoire");
            $table->string("situation_familiale");
            $table->string("date_arrivee");
            $table->string("durree_prevue_sejour");
            $table->string("competences_migrant");
            $table->string("niveau_education");
            $table->string("besoin_specifique_migrant");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('migrants');
    }
};
