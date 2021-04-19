<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otrosingreso extends Model
{
    use HasFactory;
    public function Empresa()
    {
        return $this->belongsTo('App\Models\empresa', 'NIF');
    }
}
