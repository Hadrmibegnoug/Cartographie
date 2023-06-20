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
        Schema::create('p_s_h_s', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("emplacement");
            $table->string("capacite");
            $table->string("service_dispo");
            $table->string("contact");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_s_h_s');
    }
};
