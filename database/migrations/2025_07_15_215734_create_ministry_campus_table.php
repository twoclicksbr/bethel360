<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ministry_campus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ministry');
            $table->unsignedBigInteger('id_campus');
            $table->timestamps();

            $table->foreign('id_ministry')->references('id')->on('ministry');
            $table->foreign('id_campus')->references('id')->on('campus');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ministry_campus');
    }
};
