<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID como chave primária
            $table->string('title'); // Título obrigatório
            $table->text('description')->nullable(); // Descrição opcional
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending'); // Enum para status
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks'); // Ponto e vírgula adicionado
    }
};
