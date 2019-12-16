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
