<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moradores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_completo')->nullable();
            $table->string('cidade_atual')->nullable();
            $table->string('cidade_natal')->nullable();
            $table->string('nome_familiar_proximo')->nullable();
            $table->string('grau_parentesco')->nullable();
            $table->date('data_nasc')->nullable();
            $table->foreignId('id_ong')->constrained('ongs')->cascadeOnDelete();
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
