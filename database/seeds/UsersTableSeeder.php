<?php

use Illuminate\Database\Seeder;

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

        $limit = 10;



        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->safeEmail,
                'username' => $faker->userName,
                'password' => bcrypt('password'),
                'profileImagePath' => $faker->image(public_path() .'/profile_pictures'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'remember_token' => str_random(10),
            ]);
        }

    }
}
