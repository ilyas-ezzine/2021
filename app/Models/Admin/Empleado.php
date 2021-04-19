<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'aplellidos', 'fechaNac', 'nif', 'fechaAlta', 'FechaBaja', 'nss', 'ruta'];

    //relacion uno a muchos:
    public function nominas()
    {
        return $this->hasmany('App\Models\Admin\nomina');
    }
}
