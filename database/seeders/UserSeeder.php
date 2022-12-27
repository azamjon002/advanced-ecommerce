<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'usertype' => "1",
                'password' => Hash::make('password'),
                'phone'=>'998992252102',
                'address'=>'Andijon viloyati'
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'usertype' => "0",
                'password' => Hash::make('password'),
                'phone'=>'998992252102',
                'address'=>'Andijon viloyati'
            ]
        ];

        User::insert($user);
    }
}
