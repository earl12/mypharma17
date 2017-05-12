<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++){
            User::create([ //,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('axis'),
                'role_id' => mt_rand(1,3),
                'scn' => mt_rand(101,99999),
                'status'  => 1
                ]);
        }
    }
}
