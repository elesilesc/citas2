<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = ['nombre', 'composicion', 'presentacion', 'link', 'tratamiento_id'];

    public function tratamientos()
    {
        return $this->hasMany('App\Tratamiento');
    }
}
