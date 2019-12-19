<?php

use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$faker = Faker::create();
for ($i=0; $i < 50; $i++) {
    \DB::table('pasteles')->insert(array(
           'nombre' => $faker->firstNameFemale,
           'sabor'  => $faker->randomElement(['chocolate','vainilla','cheesecake']),
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    ));
}*/
        DB::table('especialidads')->insert([
            'name' => 'Cardiología',

        ]);

        DB::table('especialidads')->insert([
            'name' => 'Pediatría',
        ]);

        DB::table('especialidads')->insert([
            'name' => 'Alergología',
        ]);

        DB::table('especialidads')->insert([
            'name' => 'Anestesiología',
        ]);

        DB::table('especialidads')->insert([
            'name' => 'Gastroenterología',
        ]);

        DB::table('especialidads')->insert([
            'name' => 'Neumología',
        ]);
    }
}
