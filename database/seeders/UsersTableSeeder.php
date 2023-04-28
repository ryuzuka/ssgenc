<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // for($i=0; $i<20; $i++)
        // {
        //     DB::table('users')->insert([
        //         'user_id' => Str::random(20),
        //         'name' => Str::random(20),
        //         'email' => Str::random(10).'@gmail.com',
        //         'password' => hash('sha256', 'password'),
        //     ]);
        // }
    }
}
