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
        Schema::create('demographiques', function (Blueprint $table) {
            $table->id();
            $table->integer("population_total");
            $table->integer("fille_total");
            $table->integer("homme_total");
            $table->integer("taux_maurtalite");
            $table->integer("taux_migrant");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demographiques');
    }
};
