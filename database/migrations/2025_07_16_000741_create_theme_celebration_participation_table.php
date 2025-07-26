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
        Schema::create('theme_celebration_participation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->unsignedBigInteger('id_theme_celebration_occurrence');
            $table->unsignedBigInteger('id_ministry');
            $table->unsignedBigInteger('id_person');
            $table->string('role')->nullable(); // função (ex: voz, vídeo)
            $table->time('entry_at')->nullable();
            $table->time('exit_at')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('id_credential')->references('id')->on('credential');
            $table->foreign('id_theme_celebration_occurrence', 'fk_participation_occurrence')
                ->references('id')
                ->on('theme_celebration_occurrence');

            $table->foreign('id_ministry')->references('id')->on('ministry');
            $table->foreign('id_person')->references('id')->on('person');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_celebration_participation');
    }
};
