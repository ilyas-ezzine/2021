<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class empleadoController extends Controller
{
    
    public function index()
    {
        return view('admin.empleados.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();

        //return  storage::put('empleados',$request->file('file'));
        //$empleado = Empleado::create($request->all());
        if ($request->file("file")) {
            $ruta = Storage::put('empleados', $request->file('file'));
            $empleado->ruta = $ruta;
        }
        //$empleado->ruta = $ruta;
        $empleado->nombre = $request->nombre;
        $empleado->Apellidos = $request->Apellidos;
        $empleado->NIF = $request->NIF;
        $empleado->FechaNac = $request->FechaNac;
        $empleado->FechaAlta = $request->FechaAlta;
        $empleado->FechaBaja = $request->FechaBaja;
        $empleado->NSS = $request->NSS;
        $empleado->save();
        return redirect()->route('admin.empleados.index');
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $empleado=Empleado::find($id);

        return view('admin.empleados.edit', compact('empleado'));
    }


    public function update(Request $request, $id)
    {
        $empleado=Empleado::find($id);
        if ($request->file("file")) {
            $ruta = Storage::put('empleados', $request->file('file'));
            $empleado->ruta = $ruta;
        }
        //$empleado->ruta = $ruta;
        $empleado->nombre = $request->nombre;
        $empleado->Apellidos = $request->Apellidos;
        $empleado->NIF = $request->NIF;
        $empleado->FechaNac = $request->FechaNac;
        $empleado->FechaAlta = $request->FechaAlta;
        $empleado->FechaBaja = $request->FechaBaja;
        $empleado->NSS = $request->NSS;
        $empleado->save();
        return redirect()->route('admin.empleados.index');

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
        $empleado = Empleado::find($id);
        $pathToFile = storage_path('public/storage/' . $empleado->ruta);
        //return response()->download($pathToFile);
        $path = '/storage/' .  $empleado->ruta;
        return response()->download(public_path($path));
    }
}
