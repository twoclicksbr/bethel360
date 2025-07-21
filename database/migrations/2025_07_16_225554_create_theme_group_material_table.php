<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('theme_group_material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->unsignedBigInteger('id_theme_group');
            $table->unsignedBigInteger('id_theme_group_lesson')->nullable();
            $table->unsignedBigInteger('id_file')->nullable(); // referência à tabela global file
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('url', 255)->nullable(); // link externo
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theme_group_material');
    }
};
