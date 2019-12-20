<?php

use Illuminate\Database\Seeder;

class EnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('enfermedads')->insert([
            'name' => 'Arritmia',

        ]);

        DB::table('enfermedads')->insert([
            'name' => 'Bronquitis',
        ]);

        DB::table('enfermedads')->insert([
            'name' => 'Alergia al polen',
        ]);

        DB::table('enfermedads')->insert([
            'name' => 'Gripe',
        ]);

        DB::table('enfermedads')->insert([
            'name' => 'Gastronteritis',
        ]);

        DB::table('enfermedads')->insert([
            'name' => 'Neumonía',
        ]);
    }
}
