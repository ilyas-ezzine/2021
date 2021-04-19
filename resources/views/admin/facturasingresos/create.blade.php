@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <div class="card-header">
        <h1>añadir facturas de gastos</h1>
    </div>
@stop

@section('content')
    <div class="card-body">

        @csrf

        <form action="{{ route('admin.facturasingresos.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col">
                    <strong> Seleciona La Empresa:</strong>

                    <select id="empresa" class="form-control" name="NIF">

                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->NIF }}"> NIF: {{ $empresa->NIF }} Nombre:
                                {{ $empresa->Denominacíon }}</option>
                        @endforeach
                    </select><br>
                </div>
            </div>

            {{-- error NIF --}}
            <div class="row g-3" style="color:#FF0000;">
                <div class="col-4">
                    <x-jet-input-error for='NIF' />
                </div>
            </div>



            <div class="row g-3">
                <div class="col">
                    <strong> la Base Imponible </strong>
                    <input type="number" step="0.01" class="form-control" value="{{ old('valor') }}"
                        placeholder="Base Imponible" aria-label="valor" name='valor'>
                    <br>
                </div>

            </div>
            {{-- error valor --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    <x-jet-input-error for='valor' />
                </div>
            </div>



            <div class="row g-3">
                <div class="col">
                    <strong>Seleciona el tipo del iva: <br></strong>
                    <input type="radio" aria-label="iva" name='iva' value=0.21>
                    <label for=0.21>21 % &nbsp;&nbsp; &nbsp;&nbsp; </label>

                    <input type="radio" aria-label="nif" name='iva' value=0.10>
                    <label for=0.10> 10 % </label>
                    <br><br>
                </div>
            </div>

            {{-- error  IVA --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    <x-jet-input-error for='iva' />
                </div>
            </div>

            <div class="row g-3">
                <div class="col">
                    <p> Seleciona La Fecha de emision: </p>
                    <input type="date" class="form-control" placeholder="Fecha" value="{{ old('Fecha') }}"
                        aria-label="Fecha" name="Fecha">

                    <br>
                </div>

            </div>

            {{-- error de fecha --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    <x-jet-input-error for='Fecha' />
                </div>
            </div>


            {{-- descripcion --}}

            <div class="row g-3">
                <div class="col">
                    <p> descripcion:</p>
                    <input type="text" class="form-control" value="{{ old('descripcion') }}" placeholder="Concepto"
                        aria-label="descripcion" name='descripcion'>
                    <br>
                </div>
            </div>


            {{-- error de descripcion --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    <x-jet-input-error for='descripcion' />
                </div>
            </div>



            <div class="row g-3">
                <div class="col">
                    <p> Adjuntar Archivo: </p>
                    <input type="file" class="form-control" placeholder="subir archivo" aria-label="file" name='file'>
                    <br>
                </div>

                {{-- errror de subida archivo --}}
            </div>
            <div class="row g-3" style="color:#FF0000;">
                <div class="col-4">
                    <x-jet-input-error for='file' />
                </div>
                <br>
            </div>


            <div class="row g-3">
                <div class="col w-45">
                    <button type="submit" class="btn btn-primary" placeholder="subir archivo" aria-label="ruta">
                        Agregar Factura</button>
                </div>
                <div class="col w-45">
                    <a type="button"  class="btn btn-primary" href="{{ route('admin.empresas.create') }}">Añadir
                        empresa</a>
                </div>
            </div>
             @if ($errors->any())
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif 


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
