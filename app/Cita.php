<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fecha_hora', 'medico_id', 'paciente_id', 'localizacion'];

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function getFechaFinAttribute()
    {
        $date = 'fecha_hora';
        $date->modify('+15 minute');
        //Date("Y:M:s", strtotime("15 minutes", strtotime($fechainit->time)));
        //{{ date('Y-m-d', strtotime('+15 minutes')) }}
    }

}
