<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        
        for($i = 0; $i < 10; $i ++){
        	\DB::table('people')->insert(array(
        			'ci' => $faker->randomDigit,
        			'name' => $faker->firstName,
        			'last_name' => $faker->lastName,
        			'email' => $faker->unique()->email,
        			'telephone' => $faker->phoneNumber,
        			'id_country' => $faker->randomNumber(1),
        	));
        }
    }
}
