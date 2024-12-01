<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('autor');
            $table->string('descricao');
            $table->string('capa');
            $table->string('tipoLivro');
            $table->string('livro');
            $table->string('genero');
            $table->unsignedInteger('like')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
