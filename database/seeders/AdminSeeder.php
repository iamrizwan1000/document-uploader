<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
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
        Admin::updateOrCreate(
            [
                'name' => 'Admin',
                'email' => 'test@test.com',
                'password' => 'test',
                'email_verified_at' => Carbon::now(),

            ]
        );
    }
}
