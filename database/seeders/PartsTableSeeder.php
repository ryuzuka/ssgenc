<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Part::factory(10)->create();
    }
}
