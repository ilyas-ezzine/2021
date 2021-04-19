@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <h1>IRPF modelo 130</h1>
@stop

@section('content')
    
    @livewire('admin.irpf-index')

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
