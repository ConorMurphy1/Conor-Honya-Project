<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected $seeders = [
        RolesTableSeeder::class,
    ];
    public function run()
    {
        $this->call($this->seeders);
    }
}
