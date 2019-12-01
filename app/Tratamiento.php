<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ['initTime', 'endTime', 'descripcion', 'units', 'frecuencia', 'instrucciones',
        'cita_id', 'medicamento_id'];

    public function citas()
    {
        return $this->belongsTo('App\Cita');
    }

    public function medicamentos(){
        return $this->belongsTo('App\Medicamento');
    }
}
