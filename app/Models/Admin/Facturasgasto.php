<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturasgasto extends Model
{
    use HasFactory;
    public function Empresa()
    {
        return $this->belongsTo('App\Models\empresa', 'NIF');
    }
}
