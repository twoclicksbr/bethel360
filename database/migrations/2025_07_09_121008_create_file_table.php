<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('file', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->string('target_table');
            $table->unsignedBigInteger('id_target');
            $table->string('name');
            $table->string('path');
            $table->string('type')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->string('description')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('id_credential')->references('id')->on('credential');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('file');
    }
};
