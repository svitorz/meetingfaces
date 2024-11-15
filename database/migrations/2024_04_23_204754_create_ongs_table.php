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
        Schema::create('ongs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nome_completo");
            $table->string("sigla");
            $table->string("email");
            $table->string("cnpj");
            $table->text("parcerias")->nullable();
            $table->string("url");
            $table->date('data_fundacao');
            $table->string("tipo_organizacao");
            $table->text("descricao");
            $table->string("cep");
            $table->integer("numero");
            $table->string("rua");
            $table->string("cidade");
            $table->string("bairro");
            $table->string("estado");
            $table->string("pais");
            $table->string("telefone");
            $table->foreignId('id_usuario')->unique()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ongs');
    }
};
