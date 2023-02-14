<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
                'name'      => 'Administrator',
                'email'     => 'admin@brin.go.id',
                'password'  => password_hash('12345678', PASSWORD_DEFAULT),
                'role'      => 'admin',
            ],
            [
                'name'      => 'Editor',
                'email'     => 'editor@brin.go.id',
                'password'  => password_hash('12345678', PASSWORD_DEFAULT),
                'role'      => 'editor',
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                [
                    'email'     => $user['email'],
                ],
                [
                    'name'      => $user['name'],
                    'password'  => $user['password'],
                    'role'      => $user['role'],
                    'email_verified_at' => Carbon::now(),
                ]
            );
        }
    }
}
