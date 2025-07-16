<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\Credential;
use Illuminate\Support\Carbon;

class CredentialSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $credentials = [
            ['name' => 'twoclicks',     'valid' => $now->copy()->addYears(10)],
            ['name' => 'smartclick360', 'valid' => $now->copy()->addYears(10)],
            ['name' => 'churchtarget',  'valid' => $now->copy()->addYears(10)],
        ];

        foreach ($credentials as $data) {
            Credential::firstOrCreate(
                ['name' => $data['name']],
                [
                    'valid' => $data['valid'],
                    'active' => true,
                    'deleted' => false,
                ]
            );
        }
    }
}
