<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Admin\otrogasto;
use Illuminate\Http\Request;

class otrogastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.otrogastos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = empresa::where('iva', '0')->get();
        return view('admin.otrogastos.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $gasto = new otrogasto();
        if ($request->file("file")) {
            $ruta = Storage::put('OtroGasto', $request->file('file'));
            $gasto->Ruta = $ruta;
        }


        $gasto->Fecha = $request->Fecha;
        $gasto->Valor = $request->Valor;
        $gasto->NIF = $request->NIF;
        
        $gasto->Concepto = $request->Concepto;
        

        $gasto->save();
        return redirect()->route('admin.otrosgastos.index')->with('info', 'Recibo añadido correctamente');
    
    }

    public function show(otrogasto $otrogasto)
    {
        return view('admin.otrosgastos.index');
    }

   
    public function edit(otrogasto $otrogasto)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\otrogasto  $otrogasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, otrogasto $otrogasto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\otrogasto  $otrogasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(otrogasto $otrogasto)
    {
        //
    }
    public function download($id)
    {
        $otrogasto = otrogasto::find($id);
        $pathToFile = storage_path('public/storage/' . $otrogasto->ruta);
        //return response()->download($pathToFile);
        $path = '/storage/' .  $otrogasto->ruta;
        return response()->download(public_path($path));
    }
}
