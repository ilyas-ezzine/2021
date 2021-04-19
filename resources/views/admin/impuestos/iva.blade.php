@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <h1>IVA MODELO 303</h1>
@stop

@section('content')
    <p>Bienvenido al panel de control de empleados</p>
    @livewire('admin.iva-index')

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
