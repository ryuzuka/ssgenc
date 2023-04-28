<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\LegacyDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // ProjectsTableSeeder::class,
            // MenusTableSeeder::class,
            // MainNoticesTableSeeder::class,
            // NoticesTableSeeder::class,
            // UsersTableSeeder::class,
            // MessagesTableSeeder::class,
            // PartsTableSeeder::class,
            //LegacyDatabaseSeeder::class     //전체 쿼리를 raw 데이터로 덤프해서 생성한다.
        ]);
    }
}
