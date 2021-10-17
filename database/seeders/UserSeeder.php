<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sl.com',
            'password' => Hash::make('123')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Non Admin',
            'email' => 'nonadmin@sl.com',
            'password' => Hash::make('123')
        ])->assignRole('Non-Admin');
    }
}
