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
        Schema::create('bebidas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->float('value');
            $table->unsignedBigInteger('category_id');
            $table->string('photo');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('category_id') // O campo em `bebidas` que é a chave estrangeira
                  ->references('id') // O campo na tabela `categorias` que está sendo referenciado
                  ->on('categorias') // A tabela que possui o campo de referência
                  ->onDelete('restrict'); // Opção para nao apagar bebidas ao apagar o categorias
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bebidas');
    }
};
