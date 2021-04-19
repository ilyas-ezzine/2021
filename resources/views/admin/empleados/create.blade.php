@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <h1>Dar de alta a un empleado</h1>
@stop

@section('content')
    <div class="card-body">
        <h1> Dar de Alta un empleado</h1>


        <form action="{{ route('admin.empleados.store') }}" enctype="multipart/form-data" method="POST">

            @csrf


            {{-- nombre del empleado --}}
            <div class="row g-3">
                <div class="col">
                    <p>nombre</p>
                    <input type="text" class="form-control" placeholder="Nombre" aria-label="nif" name='nombre'>
                    <br>
                </div>
            </div>


            {{-- error nombre del empleado --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    @error('NIF')
                        <small>*{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>
            </div>


            {{-- denominacion de la empresa --}}
            <div class="row g-3">
                <div class="col">
                    <p> Apellidos:</p>
                    <input type="text" class="form-control" placeholder="Apellidos"
                        aria-label="Apellidos" name='Apellidos'>
                    <br>
                </div>
            </div>


            {{-- error denominacion  de la empresa --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    @error('Apellidos')
                        <small>*{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>
            </div>
            <div class="row g-3">
                <div class="col">
                    <p> Seleciona La Fecha de Nacimiento: </p>
                    <input type="date" class="form-control" placeholder="Fecha de nacimiento" aria-label="FechaNac" name="FechaNac">

                    <br>
                </div>
            </div>


                <div class="row g-3">
                    <div class="col">
                        <p> Seleciona La Fecha de Alta: </p>
                        <input type="date" class="form-control" placeholder="Fecha de alta" aria-label="FechaAlta" name="FechaAlta">
    
                        <br>
                    </div>
                </div>

                    <div class="row g-3">
                        <div class="col">
                            <p> Seleciona La Fecha de Baja: </p>
                            <input type="date" class="form-control" placeholder="Fecha de Baja" aria-label="FechaBaja" name="FechaBaja">
        
                            <br>
                        </div>
                    </div>
                    

            {{-- Direcion  de la empresa --}}
            <div class="row g-3">
                <div class="col">
                    <p> DNI:</p>
                    <input type="text" class="form-control" placeholder="NIF" aria-label="NIF"
                        name='NIF'>
                    <br><br>
                </div>
            </div>
            {{-- Direcion  de la empresa --}}
            <div class="row g-3">
                <div class="col">
                    <p> NAF:</p>
                    <input type="text" class="form-control" placeholder="NSS" aria-label="NSS"
                        name='NSS'>
                    <br><br>
                </div>
            </div>






            {{-- error NIF  del empleado --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    @error('NIF')
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

            {{-- Submit agregar empleado --}}

            <div class="row g-3">

                <button type="submit" class="btn btn-primary">
                    Agregar Empleado
                </button>

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
