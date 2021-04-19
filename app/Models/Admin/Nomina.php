<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'valor', 'retenciones', 'observaciones', 'ruta'];

    //relacion muchos a uno
    public function empleado()
    {
        return $this->belongsTo('App\Models\admin\empleado');
    }
}
