<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDocumentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_document')->insert([
            [
                'id_credential' => 1,
                'name' => 'RG',
                'mask' => null,
                'active' => 1,
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_credential' => 1,
                'name' => 'CPF',
                'mask' => '999.999.999-99',
                'active' => 1,
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_credential' => 1,
                'name' => 'CNPJ',
                'mask' => '99.999.999/9999-99',
                'active' => 1,
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
