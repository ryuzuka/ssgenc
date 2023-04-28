<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MainNoticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MainNotice::factory(30)->create();
    }
}
