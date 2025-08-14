<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\Person;
use App\Models\Api\Credential;
use Illuminate\Support\Carbon;

class PersonSeeder extends Seeder
{
    public function run(): void
    {
        $birth = Carbon::createFromFormat('d/m/Y', '09/05/1985');

        $credentials = Credential::whereIn('name', ['twoclicks', 'smartclick360', 'churchtarget'])->get();

        foreach ($credentials as $cred) {
            Person::firstOrCreate(
                [
                    'id_credential' => $cred->id,
                    'name' => 'Alex - ' . $cred->name,
                ],
                [
                    'birthdate' => $birth,
                    'id_gender' => 1,
                    'active' => true,
                    'deleted' => false,
                ]
            );
        }
    }
}
