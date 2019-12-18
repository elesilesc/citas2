<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $fillable = ['name', 'surname', 'nuhsa', 'enfermedad_id','especialidad_id'];


    public function citas()
    {
        return $this->hasMany('App\Cita');
    }

    public function enfermedad(){
        return $this->belongsTo('App\Enfermedad');
    }


    public function getFullNameAttribute()
    {
        return $this->name .' '.$this->surname;
    }

    public function scopeEspecialidad($query, $especialidad)
    {
        $especialidades= 'especialidad_id';
        if($especialidad != "" && isset($especialidades[$especialidad]))
        {
           $query-> where('especialidad', $especialidad);
        }
    }


}
