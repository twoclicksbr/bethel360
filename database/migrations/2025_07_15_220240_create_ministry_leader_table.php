<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ministry_leader', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->unsignedBigInteger('id_ministry');
            $table->unsignedBigInteger('id_person');
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('id_credential')->references('id')->on('credential');
            $table->foreign('id_ministry')->references('id')->on('ministry');
            $table->foreign('id_person')->references('id')->on('person');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ministry_leader');
    }
};
