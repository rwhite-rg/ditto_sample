<?php

use Illuminate\Database\Seeder;
use Database\Seeds\InitialTestingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            InitialTestingSeeder::class
        );
    }
}
