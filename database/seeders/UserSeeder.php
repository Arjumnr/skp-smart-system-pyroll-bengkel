<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelUser;


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
                'username' => 'admin',
                'password' => bcrypt('123'),
                'role' => 1,
            ],

            [
                'name' => 'Mekanik Handal',
                'username' => 'mk1',
                'password' => bcrypt('123'),
                'role' => 2,
            ],
            [
                'name' => 'Mekanik',
                'username' => 'mk2',
                'password' => bcrypt('123'),
                'role' => 2,
            ],
        ];

        foreach ($user as $key => $value) {
            ModelUser::create($value);
        }
    }
}
