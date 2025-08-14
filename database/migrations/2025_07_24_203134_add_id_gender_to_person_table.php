<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('person', function (Blueprint $table) {
            $table->unsignedBigInteger('id_gender')->nullable()->after('birthdate');
        });
    }

    public function down(): void
    {
        Schema::table('person', function (Blueprint $table) {
            $table->dropColumn('id_gender');
        });
    }
};
