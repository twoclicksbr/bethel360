<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Api\Person;
use App\Models\Api\PersonUser;
use Illuminate\Support\Str;

class PersonUserSeeder extends Seeder
{
    public function run(): void
    {
        $people = Person::where('name', 'like', 'Alex - %')->get();

        foreach ($people as $person) {
            $credentialName = Str::after($person->name, 'Alex - ');
            $email = 'alex@' . strtolower($credentialName) . '.com';

            PersonUser::firstOrCreate(
                [
                    'id_person' => $person->id,
                    'email' => $email,
                ],
                [
                    'id_credential' => $person->id_credential,
                    'password' => Hash::make('123456'),
                    'active' => true,
                    'deleted' => false,
                ]
            );
        }
    }
}
