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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->String("nome", 60);
            $table->String("cargo", 50);
            $table->String("pagamento", 20);
            $table->String("admissao",10);
            $table->String("demissao",10);
            $table->boolean("ativo", 1);
            $table->softDeletes($column = 'deleted_at', $precision = 0);         
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
