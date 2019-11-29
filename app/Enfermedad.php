<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    //
    protected $fillable = ['name'];

    public function pacientes()
    {
        return $this->hasMany('App\Paciente');
    }
    public function especialidades()
    {
        return $this->OneToMany('App\Especialidad');
    }
}
