@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <div class="card-header">
        <h1>añadir gastos</h1>
    </div>
@stop

@section('content')
    <div class="card-body">

        @csrf

        <form action="{{ route('admin.otrosgastos.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col">
                    <strong> Seleciona el emisor:</strong>

                    <select id="empresa" class="form-control" name="NIF">

                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->NIF }}">  Nombre:
                                {{ $empresa->Denominacíon }}</option>
                        @endforeach
                    </select><br>
                </div>

            </div>
            <div class="row g-3" style="color:#FF0000;">
                <div class="col-4">
                    @error('NIF')
                        <small>*{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>
            </div>



            <div class="row g-3">
                <div class="col">
                    <strong> importe </strong>
                    <input type="number" step="0.01" class="form-control" placeholder="Importe" aria-label="Valor"
                        name='Valor'>
                    <br>
                </div>

            </div>

            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    @error('valor')
                        <small>*{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>
            </div>




            

            <div class="row g-3">
                <div class="col">
                    <p> Seleciona La Fecha de emision: </p>
                    <input type="date" class="form-control" placeholder="Fecha" aria-label="Fecha" name="Fecha">

                    <br>
                </div>

            </div>
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    @error('Fecha')
                        <small color:red>*{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>
            </div>

            <div class="row g-3">
                <div class="col">
                    <p> descripcion:</p>
                    <input type="text" class="form-control" placeholder="Concepto" aria-label="Concepto"
                        name='Concepto'>
                    <br>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    @error('descripcion')
                        <small>*{{ $message }}</small>
                        <br><br>
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
            <div class="row g-3" style="color:#FF0000;">
                <div class="col-4">
                    @error('file')
                        <small>*{{ $message }}</small>
                        <br><br><br>
                    @enderror
                </div>
                <br>
            </div>


            <div class="row g-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary" placeholder="subir archivo" aria-label="ruta">
                        Agregar Gasto</button>
                </div>
                <div class="col">
                    <a type="button" class="btn btn-primary" href="{{ route('admin.empresas.create') }}">Añadir
                        empresa</a>
                </div>
            </div>

        </form>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
    @livewireScripts
@stop
