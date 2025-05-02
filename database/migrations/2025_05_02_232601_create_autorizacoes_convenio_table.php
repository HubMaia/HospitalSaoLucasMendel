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
        Schema::create('autorizacoes_convenio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consulta_id')->constrained('consultas')->onDelete('cascade');
            $table->foreignId('convenio_id')->constrained('convenios')->onDelete('cascade');
            $table->string('numero_carteirinha', 50);
            $table->string('status', 20)->default('pendente');
            $table->date('data_autorizacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorizacoes_convenio');
    }
};
