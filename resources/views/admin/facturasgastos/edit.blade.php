@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <h1>Editar una factura de gastos</h1>
@stop

@section('content')
    <p>Panel de control de Facturas</p>
    @csrf

    <form action="{{ route('admin.facturasgastos.update', $factura) }}" enctype="multipart/form-data" method="POST">

        @csrf
        @method('put')

        <div class="card-body">

            <div class="row g-3">
                <div class="col">
                    <p> Seleciona La Empresa: </p>

                    <select id="empresa" class="form-control" name="NIF">

                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->NIF }}"> NIF: {{ $empresa->NIF }} Nombre:
                                {{ $empresa->Denominacíon }}</option>
                        @endforeach
                    </select>

                    <br>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-4">
                    @error('NIF')
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
            </div>



            <div class="row g-3">
                <div class="col">
                    <p> la Base Imponible </p>
                    <input type="number" step="0.01" class="form-control" placeholder="Base Imponible" aria-label="valor"
                        value="{{ $factura->valor }}" name='valor'>
                    <br>
                </div>

            </div>

            <div class="row g-3">
                <div class="col-4">
                    @error('valor')
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
            </div>



            <div class="row g-3">
                <div class="col">
                    <p>Seleciona el tipo del iva:</p>
                    <input type="radio" aria-label="iva" name='iva' value=0.21>
                    <label for=0.21> 21 % &nbsp;&nbsp; &nbsp;&nbsp; </label>

                    <input type="radio" aria-label="nif" name='iva' value=0.10>
                    <label for=0.10> 10 % </label>
                    <br>
                </div>

            </div>

            <div class="row g-3">
                <div class="col-4">
                    @error('IVA')
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
            </div>

            <div class="row g-3">
                <div class="col">
                    <p> Seleciona La Fecha de emision: </p>
                    <input type="date" class="form-control" placeholder="Fecha" aria-label="Fecha" name="Fecha"
                        value="{{ $factura->fecha }}">

                    <br>
                </div>
            </div>

            <div class="row g-3">
                <div class="col">
                    <p> Fecha de Emision:</p>
                    <input type="text" class="form-control" placeholder="Concepto" aria-label="descripcion"
                        name='descripcion' value="{{ $factura->descripcion }}">
                    <br>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-4">
                    @error('descripcion')
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
            </div>



            <div class="row g-3">
                <div class="col">
                    <p> Adjuntar Archivo: </p>
                    <input type="file" class="form-control" placeholder="subir archivo" aria-label="file" name='file'>
                    <br>
                </div>


            </div>
            <div class="row g-3">
                <div class="col-4">
                    @error('file')
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <br>
            </div>
    </form>


    <div class="row g-3">
        <div class="col">
            <button type="submit" class="btn btn-primary" placeholder="subir archivo" aria-label="ruta">
                Actualizar factura</button>
        </div>
        <div class="col">
            <a href="#" class="btn btn-primary">Cancelar</a>
        </div>
    </div>
    </form>


    </div>








@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
    @livewireScripts
@stop
