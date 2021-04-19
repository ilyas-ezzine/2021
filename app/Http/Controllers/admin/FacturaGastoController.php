<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFactura;
use App\Models\Admin\Empresa;
use App\Models\Admin\Facturasgasto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class FacturaGastoController extends Controller
{
    public function index()
    {
        /* $facturas = facturasgasto::all();
       return view('admin.FacturasGastos.index',compact('facturas')); */
        return view('admin.facturasgastos.index');
    }



    public function create()
    {
        $empresas = Empresa::where('iva', '<>', 0)->get();
        return view('admin.facturasgastos.create', compact('empresas'));
    }


    public function store(StoreFactura $request)
    {
       /*  $request->validate([

            'NIF' => 'required',
            'file' => 'required',
            'valor' => 'required',
            'Fecha' => 'required',
            'descripcion' => 'required',
            'IVA' => 'required',
           
            'IVA' => 'required',
            'Fecha' => 'required',
            
            'file' => 'required',
            'denominacíon' => 'required',
            'direccion' => 'required',
        ]);
 */

        $factura = new Facturasgasto();
        if ($request->file("file")) {
            $ruta = Storage::put('FacturasDeGastos', $request->file('file'));
            $factura->ruta = $ruta;
        }

        $factura->NIF = $request->NIF;
        $factura->valor = $request->valor;
        $factura->iva = $request->iva;
        $factura->Fecha = $request->Fecha;
        $factura->descripcion = $request->descripcion;


        $factura->save();
        return redirect()->route('admin.facturasgastos.index')->with('info', 'Factura añadida correctamente');
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $factura = facturasgasto::find($id);
        $empresas = Empresa::all();
        return view('admin.facturasgastos.edit', compact('factura', 'empresas'));
    }


    public function update(Request $request, $id)
    {
        $entrada = $request->all;
        if ($archivo = $request->file('file')) {

            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $entrada['ruta'] = $nombre;
        }

        $factura = facturasgasto::find($id);

        $factura->NIF = $request->NIF;
        $factura->valor = $request->valor;
        $factura->iva = $request->iva;
        $factura->fecha = $request->Fecha;
        $factura->descripcion = $request->descripcion;
        $factura->Ruta = $nombre;

        $factura->save();
        return redirect()->route('admin.facturasgastos.index');
    }


    public function destroy($id)
    {
    }
}
