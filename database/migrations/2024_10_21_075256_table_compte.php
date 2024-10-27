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
        schema::create('comptes', function (Blueprint $table) {
           $table->id();
           $table->string('rib');
            $table->decimal('solde', 10, 2)->default(0); // 10 chiffres au total avec 2 décimales
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
