<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('theme_group', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->unsignedBigInteger('id_type_group'); // célula, curso, mentoria etc.
            $table->string('name'); // nome do grupo
            $table->unsignedBigInteger('id_leader')->nullable(); // líder principal
            $table->boolean('online')->default(0);
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('id_credential')->references('id')->on('credential');
            $table->foreign('id_type_group')->references('id')->on('type_group');
            $table->foreign('id_leader')->references('id')->on('person');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theme_group');
    }
};
