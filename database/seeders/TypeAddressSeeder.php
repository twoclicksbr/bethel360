<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAddressSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_address')->insert([
            [
                'id_credential' => 1,
                'name' => 'Residencial',
                'active' => 1,
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_credential' => 1,
                'name' => 'Comercial',
                'active' => 1,
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
