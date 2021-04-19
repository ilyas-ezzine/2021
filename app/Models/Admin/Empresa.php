<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nif', 'denominacíon', 'direccion'];

    //relacion uno a muchos
    public function facturasgastos()
    {
        return $this->hasmany('App\Models\facturasgasto', 'NIF');
    }

    public function facturasingresos()
    {
        return $this->hasMany('App\Models\facturasingreso', 'NIF');
    }
    public function otrosgastos()
    {
        return $this->hasMany('App\Models\otrogasto', 'NIF');
    }

    public function otrosingresos()
    {
        return $this->hasMany('App\Models\otroingreso', 'NIF');
    }
    
}
