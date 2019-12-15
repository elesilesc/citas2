<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ['initTime', 'endTime', 'descripcion', 'units', 'frecuencia', 'instrucciones',
        'cita_id','medicamento_id'];

    public function cita()
    {
        return $this->belongsTo('App\Cita');
    }

    public function medicamento(){
        return $this->belongsTo('App\Medicamento');
    }
}
