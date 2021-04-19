@extends('adminlte::page')

@section('title', 'Maite')

@section('content_header')
    <h1>Lista de nominas</h1>
@stop

@section('content')
    
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
        
    @endif
    @livewire('admin.nominas-index')
        
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    @livewireScripts
@stop
