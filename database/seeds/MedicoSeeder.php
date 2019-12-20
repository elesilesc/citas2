<?php

use Illuminate\Database\Seeder;
use  Faker\Factory as Faker;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <=8; $i++) {
            DB::table('medicos')->insert(array(
                'id'=>$faker->unique()->numberBetween($min = 1, $max = 8),
                'name' => $faker->firstName,
                'surname' => $faker-> lastName,
                'especialidad_id' => App\Especialidad::all()->random()->id,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
