<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(CourtsTableSeeder::class);
        $this->call(CourtUserTableSeeder::class);
        Model::reguard();
    }
}
