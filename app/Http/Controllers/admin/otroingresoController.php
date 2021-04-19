<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\otroingreso;
use Illuminate\Http\Request;

class otroingresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.otroingresos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\otroingreso  $otroingreso
     * @return \Illuminate\Http\Response
     */
    public function show(otroingreso $otroingreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\otroingreso  $otroingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(otroingreso $otroingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\otroingreso  $otroingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, otroingreso $otroingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\otroingreso  $otroingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(otroingreso $otroingreso)
    {
        //
    }
}
