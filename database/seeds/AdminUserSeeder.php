<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin super',
            'email' => 'admin@wedding.test',
            'password' => bcrypt('12345678'),
        ]);
    }
}
