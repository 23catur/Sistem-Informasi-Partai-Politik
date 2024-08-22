<?php

namespace Database\Seeders;

use App\Enums\UserLevel;
use App\Models\User;
use Illuminate\Database\Seeder;

class SuperuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! User::where('username', 'superuser')->first()) {
            User::create([
                'name' => 'Superuser',
                'username' => 'superuser',
                'email' => 'superuser@mail.com',
                'password' => bcrypt('superuser'),
                'level' => UserLevel::Superuser,
            ]);
        }
    }
}
