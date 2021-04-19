<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Storenomina;
use App\Models\Admin\Empleado;
use App\Models\Admin\Nomina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NominaController extends Controller
{

    public function index()
    {
        return view('admin.nominas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        return view('admin.nominas.create', compact('empleados'));
    }


    public function store(Storenomina $request)
    {

        $nomina = new Nomina();
        if ($request->file("file")) {
            $ruta = Storage::put('nominas', $request->file('file'));
            $nomina->ruta = $ruta;
        }


        $nomina->Fecha = $request->Fecha;
        $nomina->valor = $request->valor;
        $nomina->retenciones = $request->retenciones;
        $nomina->observaciones = $request->observaciones;
        $nomina->empleado_id = $request->empleado_id;

        $nomina->save();
        return redirect()->route('admin.nominas.index')->with('info', 'nomina añadida correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function download($id)
    {
        $nomina = nomina::find($id);
        $pathToFile = storage_path('public/storage/' . $nomina->ruta);
        //return response()->download($pathToFile);
        $path = '/storage/' .  $nomina->ruta;
        return response()->download(public_path($path));
    }
}
