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
        Schema::rename('nome_tabela', 'novo_nome'); // renomeia a tabela produtos para items
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('novo_nome', 'nome_tabela'); // reverte o nome da tabela para produtos
    }
};
