<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin =
            [
                [
                    'name' => 'admin',
                    'email' => 'zdarmawan95@gmail.com',
                    'password' => bcrypt('admin123'),
                    'is_admin' => true,
                ]
            ];
        User::insert($admin);
    }
}
