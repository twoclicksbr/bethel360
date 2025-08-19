<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CredentialSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(PersonUserSeeder::class);
        $this->call(TypeGenderSeeder::class);
        $this->call(TypeAddressSeeder::class);
        $this->call(TypeDocumentSeeder::class);


        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
