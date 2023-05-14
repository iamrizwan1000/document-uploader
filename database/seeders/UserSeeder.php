<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        $user = [
            [
                'first_name' => 'syed',
                'last_name' => 'syed',
                'email' => 'syed@gmail.com',
                'password' => 'a',
                'email_verified_at' => Carbon::now(),


            ]
        ];



        foreach ($user as $users) {
            User::updateOrCreate(
                $users
            );
        }
    }
}
