<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            [
                'email' => 'toponimi@brin.go.id'
            ],
            [
                'password'          => Hash::make('12345678'),
                'name'              => 'Administrator',
                'role'              => 'admin',
                'email_verified_at' => Carbon::now(),
            ]
        );
    }
}
