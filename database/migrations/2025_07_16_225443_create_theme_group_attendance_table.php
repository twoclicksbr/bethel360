<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('theme_group_attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->unsignedBigInteger('id_theme_group');
            $table->unsignedBigInteger('id_theme_group_lesson');
            $table->unsignedBigInteger('id_person');
            $table->boolean('present')->default(0);
            $table->string('observation')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theme_group_attendance');
    }
};
