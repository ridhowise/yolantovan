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
        $user = new User;
        $user->id = "1";
        $user->name = "Admin";
        $user->email = "admin";
        $user->password = bcrypt('admin'); 
        $user->save();
    }
}
