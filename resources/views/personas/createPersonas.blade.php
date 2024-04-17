<?php
$accion = isset($personas) ? true : false;
$title = $accion ? 'Editar Persona' : 'Registrar Persona';
?>

@extends('layouts.principal')

@section('container')

<main class="container">
    <h1 class="mt-4">{{$title}}</h1>
    <form class="mt-4" action="{{$accion?'/personas/'.$personas->id:'/personas'}}" method="POST">
        @csrf
        @if($accion)
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Id</label>
            <input type="number" name="idPersona" id="idPersona" class="form-control" value="{{$accion?$personas->id:''}}" readonly>
        </div>
        @endif
        <div class="mb-3">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$accion?$personas->nombre:''}}">
        </div>

        <div class="mb-3">
            <label for="">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{$accion?$personas->apellido:''}}">
        </div>

        <div class="mb-3">
            <label for="">Fecha Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{$accion?$personas->fecha_nacimiento:''}}">
        </div>

        <div class="mb-3">
            <label for="">Genero</label>
            <select name="genero" id="genero" class="form-select">
                <option value="">Seleccione un genero</option>
                <option value="Masculino" {{$accion && $personas->genero == 'Masculino' ? 'selected' : ''}}>Masculino</option>
                <option value="Femenino" {{$accion && $personas->genero == 'Femenino' ? 'selected' : ''}}>Femenino</option>
                <option value="Otro" {{$accion && $personas->genero == 'Otro' ? 'selected' : ''}}>Otro</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="">Direccion</label>
            <textarea name="direccion" id="direccion" cols="30" rows="3" class="form-control ">{{$accion?$personas->direccion:''}}</textarea>
        </div>

        <div class="mb-3 text-center my-5">
            <button type="submit" class="btn btn-primary w-25  ">Confirmar</button>

        </div>

    </form>


</main>

@endsection