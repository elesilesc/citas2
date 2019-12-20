<?php

use Illuminate\Database\Seeder;
use  Faker\Factory as Faker;

class LocalizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 5; $i++) {
            DB::table('localizacions')->insert(array(
                'id' => $faker->unique()->numberBetween($min = 1, $max = 5),
                'hospital' => $faker->unique()->randomElement($array = array('Hospital Universitario Virgen Macarena',
                    'Hospital Universitario Virgen del Rocío', 'Hospital Fátima', 'Hospital San Juan de Dios', 'Hospital QuirónSalud')),
                'consulta' =>$faker->numberBetween($min = 1, $max = 20),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
