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
        Schema::create('virements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compte_emetteur_id')->constrained('comptes')->onDelete('cascade');
            $table->foreignId('compte_recepteur_id')->constrained('comptes')->onDelete('cascade');

            $table->decimal('montant', 10, 2);
            $table->timestamps();
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virements');
    }
};
