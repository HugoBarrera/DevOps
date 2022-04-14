{{-- Heredar la plantilla app.blade --}}
@extends('layouts.app')
{{-- Agregar un title especifico a esta vista --}}
@section('title', 'Administración')
{{-- Dentro de esta sección agregamos todo el contenido de esta vista --}}
@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <h1>Proyectos</h1>
        </div>
        <div class="col-md-4">
            <a class="btn btn-success" href="{{ route('proyectos.create') }}">Nuevo Proyecto</a>
        </div>
    </div>

    {{-- Listado de proyectos --}}
    @foreach ($proyectos as $proyecto) {{-- proyecto hace referencia al modelo proyecto, gracias a eso tenemos acceso a todas las propiedades y metodos dentro de el --}}
        <div class="row my-3 p-3 border-0 shadow bg-white">
            <div class="col-md-12">
                {{ $proyecto->nombre }}
            </div>
            <div class="col-md-4">
                <p class="fond-weight-bold">Tipo de Proyecto</p>
                <p class="mb-0 text-secondary"> {{$proyecto->tipo->nombre}} </p> {{-- Estamos accediendo al metodo y al nombre del campo de la BD que nos trae la consulta --}}
            </div>
            <div class="col-md-4">
                <p class="fond-weight-bold">Usuario Creador</p>
                <p class="mb-0 text-secondary"> {{$proyecto->usuario->name}} </p>
            </div>
            <div class="col-md-4">
                <p class="fond-weight-bold">Estatus</p>
                <p class="mb-0 text-secondary"> {{$proyecto->estatus->nombre}} </p>
            </div>
        </div>
    @endforeach

@endsection
