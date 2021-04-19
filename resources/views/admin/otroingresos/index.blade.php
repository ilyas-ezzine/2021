@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <h1>Lista de facturas de ingresos</h1>
@stop

@section('content')
    <p>Panel de control de Otros ingresos</p>
    @if (session('info'))
        <div class="alert alert-sucess">
            <strong>{{ session('info') }}</strong>
        </div>

    @endif
   
  
    @livewire('admin.otrosin-index')

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
