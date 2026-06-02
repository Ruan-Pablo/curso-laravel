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
        Schema::table('modificar_nomee', function (Blueprint $table) {
            $table->renameColumn('nomee', 'nome'); // renomeia a coluna nomee para nome
            $table->dropColumn('nomecompleto'); // remove a coluna nomee
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
