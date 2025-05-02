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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cpf', 14)->unique();
            $table->string('genero', 20);
            $table->integer('idade');
            $table->date('data_nascimento');
            $table->string('endereco', 150);
            $table->string('telefone', 20);
            $table->string('matricula', 20)->unique();
            $table->date('data_admissao');
            $table->date('data_demissao')->nullable();
            $table->boolean('necessidades_especiais')->default(false);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
