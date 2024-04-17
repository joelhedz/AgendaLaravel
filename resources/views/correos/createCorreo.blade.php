<?php
$accion = isset($correos) ? true : false;
$title = $accion ? 'Editar Contacto' : 'Registrar Contacto';
?>

@extends('layouts.principal')

@section('container')

<main class="container">
    <h1 class="mt-4">{{$title}}</h1>
    <form class="mt-4" action="{{$accion?'/correos/'.$correos->id:'/correos'}}" method="POST">
        @csrf
        @if($accion)
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Id</label>
            <input type="number" name="idPersona" id="idPersona" class="form-control" value="{{$accion?$correos->id:''}}" readonly>
        </div>
        @endif
        <div class="mb-3">
            <label for="">Cod Persona</label>
            <input type="text" name="codPersona" id="codPersona" class="form-control" value="{{$accion?$correos->persona_id:$idcontacto}}" readonly>
        </div>

        <div class="mb-3">
            <label for="">correo</label>
            <input type="email" name="correo" id="correo" class="form-control" value="{{$accion?$correos->correo:''}}">
        </div>

        <div class="mb-3">
            <label for="">Tipo Correo</label>
            <select name="tipoCorreo" id="tipoCorreo" class="form-select ">
                <option value="">Seleccione</option>
                <option value="Corporativo" {{$accion && $correos->tipo_correo == 'Corporativo' ? 'selected' : ''}}>Corporativo</option>
                <option value="Personal" {{$accion && $correos->tipo_correo == 'Personal' ? 'selected' : ''}}>Personal</option>
                <option value="Transaccionales" {{$accion && $correos->tipo_correo == 'Transaccionales' ? 'selected' : ''}}>Transaccionales</option>
                <option value="Trabajo" {{$accion && $correos->tipo_correo == 'Trabajo' ? 'selected' : ''}}>Trabajo</option>
            </select>

        </div>


        <div class="mb-3 text-center my-5">
            <button type="submit" class="btn btn-primary w-25  ">Confirmar</button>
            <a href="/contactos/{{$accion?$correos->persona_id: $idcontacto}}" class="btn btn-warning w-25">Cancelar</a>
        </div>

    </form>


</main>

@endsection