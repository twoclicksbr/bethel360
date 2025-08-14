<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_credential');
            $table->string('target_table');
            $table->unsignedBigInteger('id_target');
            $table->unsignedBigInteger('id_type_document');
            $table->string('value');
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('id_credential')->references('id')->on('credential');
            $table->foreign('id_type_document')->references('id')->on('type_document');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document');
    }
};
