<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('document', function (Blueprint $table) {
            $table->unique(['id_credential', 'value', 'deleted'], 'uq_document_credential_value_deleted');
        });
    }

    public function down()
    {
        Schema::table('document', function (Blueprint $table) {
            $table->dropUnique('uq_document_credential_value_deleted');
        });
    }
};
