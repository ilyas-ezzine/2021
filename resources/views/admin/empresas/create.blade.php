@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <h1>Dar de alta a una empresa</h1>
@stop

@section('content')
    <div class="card-body">
        <h1> Dar de Alta una empresa</h1>


        <form action="{{ route('admin.empresas.store') }}" enctype="multipart/form-data" method="POST">

            @csrf


            {{-- nif de la empresa --}}
            <div class="row g-3">
                <div class="col">
                    <p> NIF de la empresa:</p>
                    <input type="text" value ="{{old('NIF')}}" class="form-control" placeholder="NIF de la empresa" aria-label="NIF" name='NIF'>
                    <br>
                </div>
            </div>


            {{-- error nif de la empresa --}}
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
                    <strong>¿ Esta empresa Genera Facturas con IVA ? <br></strong>
                    <input type="radio" aria-label="IVA" name='IVA' value=1>
                    <label for=1>SÍ &nbsp;&nbsp; &nbsp;&nbsp; </label>

                    <input type="radio" aria-label="IVA" name='IVA' value=0>
                    <label for=0> NO </label>
                    <br><br>
                </div>

            </div>




            {{-- denominacion de la empresa --}}
            <div class="row g-3">
                <div class="col">
                    <p> Denominación de la Empresa:</p>
                    <input type="text" class="form-control" placeholder="Denominación de la Empresa"
                        aria-label="Denominacíon" value ="{{old('Denominacíon')}}" name='Denominacíon'>
                    <br>
                </div>
            </div>


            {{-- error denominacion  de la empresa --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    @error('denominacíon')
                        <small>*{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>
            </div>

            {{-- Direcion  de la empresa --}}
            <div class="row g-3">
                <div class="col">
                    <p> direccion de la Empresa:</p>
                    <input type="text" class="form-control" placeholder="direccion de la Empresa" aria-label="Direccion"
                        name='Direccion'>
                    <br>
                </div>
            </div>





            {{-- error direccion  de la empresa --}}
            <div class="row g-3">
                <div class="col-4" style="color:#FF0000;">
                    @error('direccion')
                        <small>*{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>
            </div>

            {{-- Submit agregar empresa --}}

            <div class="row g-3">

                <button type="submit" class="btn btn-primary">
                    Agregar Empresa
                </button>

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
