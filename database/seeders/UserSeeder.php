<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::where('email', 'manuelsansoresg@gmail.com')->first();
        $user->password = bcrypt('demor00txx');
        $user->update();
    }
}
