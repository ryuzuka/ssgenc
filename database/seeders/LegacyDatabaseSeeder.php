<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegacyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //둘다 잘됨.
        // DB::unprepared(file_get_contents(__DIR__ . '/../raw/ssgenc_seeds.sql'));
        //DB::unprepared(file_get_contents(database_path('raw/ssgenc_seeds.sql')));
    }
}
