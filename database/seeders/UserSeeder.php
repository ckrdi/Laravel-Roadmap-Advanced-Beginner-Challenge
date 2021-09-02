<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Obi-wan Kenobi',
            'email' => 'generalkenobi@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret')
        ]);
        User::factory(9)->create();
    }
}
