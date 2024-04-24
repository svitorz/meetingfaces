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
        Schema::create('moradores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_completo');
            $table->string('cidade_atual');
            $table->string('cidade_natal');
            $table->string('nome_familiar_proximo');
            $table->string('grau_parentesco');
            $table->date('data_nasc');
            $table->foreignId('id_ong')->constrained('ongs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moradores');
    }
};
