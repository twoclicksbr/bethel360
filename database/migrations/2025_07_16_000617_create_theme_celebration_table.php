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
        Schema::create('theme_celebration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->string('name'); // Ex: Domingo 10h
            $table->string('description')->nullable();
            $table->string('weekday'); // Ex: sunday, saturday
            $table->time('start_time');
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('id_credential')->references('id')->on('credential');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_celebration');
    }
};
