<?php

use Illuminate\Database\Seeder;

class Especialidad extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Especialidad::class, 10)->create();
    }
}
