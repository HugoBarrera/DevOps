{{-- Heredar la plantilla app.blade --}}
@extends('layouts.app')
{{-- Agregar un title especifico a esta vista --}}
@section('title', 'Crear un nuevo Proyecto')
{{-- Dentro de esta sección agregamos todo el contenido de esta vista --}}
@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-3">Nuevo Proyecto</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('proyectos.store') }}" method="post">
                @csrf() {{-- Token de seguridad que maneja Laravel --}}
                <div class="row">
                    <div class="col-md-6">
                        <label
                            for="nombre"
                            class="text-secondary font-weight-bold d-block @error('nombre') text-danger @enderror">
                            Nombre
                        </label>
                        <input
                            type="text"
                            class="form-control border-0 shadow @error('nombre') is-invalid @enderror"
                            id="nombre"
                            name="nombre"
                            placeholder="¿Cuál es tu proyecto?"
                            value="{{ old('nombre') }}"
                        />
                        @error('nombre')
                            <span class="d-block text-danger mt-2 font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="tipo_proyecto"
                            class="text-secondary font-weight-bold d-block">
                            Tipo Proyecto
                        </label>
                        <select
                            class="form-control border-0 shadow"
                            id="tipo_proyecto"
                            name="tipo_proyecto">
                                <option value="" selected disable>- Selecciona -</option>
                                @foreach ( $tipoProyectos as $val )
                                    <option value="{{ $val->id }}">{{ $val->nombre }}</option>
                                @endforeach
                        </select>
                        @error('tipo_proyecto')
                            <span class="d-block text-danger mt-2 font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-3">
                        <label
                            for="descripcion"
                            class="text-secondary font-weight-bold d-block @error('descripcion') text-danger @enderror">
                            Descripción
                        </label>
                        <textarea
                            class="form-control border-0 shadow @error('descripcion') is-invalid @enderror"
                            id="descripcion"
                            name="descripcion"
                            placeholder="¿Cuál es tu proyecto?"
                            rows="3">
                            {{ old('descripcion') }}
                        </textarea>
                        @error('descripcion')
                            <span class="d-block text-danger mt-2 font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button
                    type="submit"
                    class="btn btn-dark mt-5">
                    Guardar Proyecto
                </button>
            </form>
        </div>
    </div>
@endsection
