<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->string('target_table');
            $table->unsignedBigInteger('id_target');
            $table->text('note');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->boolean('visible_to_user')->default(0);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('id_credential')->references('id')->on('credential');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('note');
    }
};
