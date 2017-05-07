<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ahmed',
                'email' => 'ahmed@gmail.com',
                'password' => '12345'
            ],
            [
                'name' => 'Amr',
                'email' => 'amr@gmail.com',
                'password' => '54321'
            ]
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }

    }
}
