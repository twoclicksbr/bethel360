<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_filter_memory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->unsignedBigInteger('id_person');
            $table->string('route');
            $table->text('full_url')->nullable();
            $table->timestamps();

            $table->unique(['id_credential', 'id_person', 'route']);

            $table->foreign('id_credential')->references('id')->on('credential');
            $table->foreign('id_person')->references('id')->on('person');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_filter_memory');
    }
};
