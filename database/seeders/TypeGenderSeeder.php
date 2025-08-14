<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeGenderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_gender')->insert([
            [
                'id_credential' => 1,
                'name' => 'Masculino',
                'active' => 1,
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_credential' => 1,
                'name' => 'Feminino',
                'active' => 1,
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
