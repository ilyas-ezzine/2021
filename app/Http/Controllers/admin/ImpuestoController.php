<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class ImpuestoController extends Controller
{
    public function IVA()
    {
        return view('admin.impuestos.iva');
    }

    public function irpf()
    {
        return view('admin.impuestos.irpf');
    }

    public function retencionestrabajadores()
    {
        return view('admin.impuestos.111');
    }
}
