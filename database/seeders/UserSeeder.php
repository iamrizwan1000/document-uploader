<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Color;
use App\Models\User;
use Carbon\Carbon;
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
                'name' => 'syed',
                'email' => 'syed@gmail.com',
                'password' => 'a',
                'email_verified_at' => Carbon::now(),


            ]
        ];



        foreach ($user as $users) {
            $user1 = User::updateOrCreate(
                $users
            );
        }
    }
}
