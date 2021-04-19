<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFactura;
use App\Models\admin\empresa;
use App\Models\Admin\facturasingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;





class facturasingresoController extends Controller
{
    public function index()
    {
        /* $facturas = facturasgasto::all();
       return view('admin.FacturasGastos.index',compact('facturas')); */
        return view('admin.facturasingresos.index');
    }



    public function create()
    {
        $empresas = Empresa::where('iva', '<>', 0)->get();
        return view('admin.facturasIngresos.create', compact('empresas'));
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

        $factura = new facturasingreso();
        if ($request->file("file")) {
            $ruta = Storage::put('FacturasDeingresos', $request->file('file'));
            $factura->ruta = $ruta;
        }

        $factura->NIF = $request->NIF;
        $factura->valor = $request->valor;
        $factura->iva = $request->iva;
        $factura->Fecha = $request->Fecha;
        $factura->descripcion = $request->descripcion;


        $factura->save();
        return redirect()->route('admin.facturasingresos.index')->with('info', 'Factura añadida correctamente');
    }
    public function show(facturasingreso $facturasingreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\facturasingreso  $facturasingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(facturasingreso $facturasingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\facturasingreso  $facturasingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, facturasingreso $facturasingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\facturasingreso  $facturasingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(facturasingreso $facturasingreso)
    {
        //
    }
}
