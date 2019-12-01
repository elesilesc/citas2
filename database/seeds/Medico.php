<?php

use Illuminate\Database\Seeder;

class Medico extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicos = factory(App\Medico::class, 10)->create([
          'especialidad' => $this->getRandomEspecialidad()
        ]);

    }
    private function getRandomEspecialidad(){
        $especialidad = App\Especialidad::inRandomOrder()->first;
        return $especialidad->name;
    }
}
