<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('credential', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // nome da credencial
            $table->date('valid')->nullable(); // validade da credencial
            $table->boolean('active')->default(true);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('credential');
    }
};
