<?php

use Illuminate\Database\Seeder;
use  Faker\Factory as Faker;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 6; $i++) {
            DB::table('especialidads')->insert(array(
                'id' => $faker->unique()->numberBetween($min = 1, $max = 6),
                'name' => $faker->unique()->randomElement($array = array('Cardiología', 'Pediatría', 'Gastroenterología', 'Neumología', 'Alergología', 'Anestesiología')),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
