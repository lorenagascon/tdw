<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        User::create([
            'username' => 'admin',
            'email' => 'admin@tdw.es',
            'enabled' => 1,
            'rol' => 1,
            'password' => bcrypt('admin')
        ]);

        factory(User::class)->times(5)->create();
    }
}
