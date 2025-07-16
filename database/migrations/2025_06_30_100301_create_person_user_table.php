<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('person_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->unsignedBigInteger('id_person');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('active')->default(true);
            $table->boolean('deleted')->default(false);
            $table->timestamps();

            $table->foreign('id_credential')->references('id')->on('credential');
            $table->foreign('id_person')->references('id')->on('person');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('person_user');
    }
};
