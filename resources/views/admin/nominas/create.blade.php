@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <div class="card-header">
        <h1>Añadir nominas</h1>
    </div>
@stop

@section('content')
    <div class="card-body">

        @csrf

        <form action="{{ route('admin.nominas.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col">
                    <strong> Seleciona empleado:</strong>

                    <select id="empresa" class="form-control" name="empleado_id">

                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}"> identificación: {{ $empleado->id }} &nbsp;&nbsp;   Nombre:
                                {{ $empleado->Nombre }}</option>
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
                    <strong> bruto </strong>
                    <input type="number" step="0.01" class="form-control" value="{{old('valor')}}" placeholder="salario bruto" aria-label="valor"
                        name='valor'>
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
                    <strong> Retenciones aplicadas: </strong>
                    <input type="number" step="0.01" value="{{old('retenciones')}}" class="form-control" placeholder="Retenciones aplicadas Sobre el salario bruto:" aria-label="retenciones"
                        name='retenciones'>
                    <br>
                </div>

            </div>

            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    <x-jet-input-error for='retenciones'/> 

                </div>
            </div>

            <div class="row g-3">
                <div class="col">
                    <p> Seleciona La Fecha de Nomina: </p>
                    <input type="date" class="form-control" value="{{old('Fecha')}}" placeholder="Fecha" aria-label="Fecha" name="Fecha">

                    <br>
                </div>

            </div>

            {{-- error Fecha --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    <x-jet-input-error for='Fecha'/> 

                </div>
            </div>

            <div class="row g-3">
                <div class="col">
                    <p> observaciones:</p>
                    <input type="text" value="{{old('observaciones')}}" class="form-control" placeholder="observaciones:" aria-label="observaciones"
                        name='observaciones'>
                    <br>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    <x-jet-input-error for='observaciones'/> 
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
                   {{--  @error('file')
                        <small>*{{ $message }}</small>
                        <br><br><br>
                    @enderror --}}

                    <x-jet-input-error for='file'/> 
                
                </div>
                <br>
            </div>


            <div class="row g-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary" placeholder="subir archivo" aria-label="ruta">
                        Agregar Nomina</button>
                </div>
                <div class="col">
                    <a type="button" class="btn btn-primary" href="{{ route('admin.empleados.create') }}">Añadir
                        empleado</a>
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
