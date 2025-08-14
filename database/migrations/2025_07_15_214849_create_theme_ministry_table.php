<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('theme_ministry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential')->nullable(); // permite themes globais
            $table->string('name')->unique(); // ex: celebration, kids
            $table->string('label');
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('id_credential')->references('id')->on('credential');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theme_ministry');
    }
};
