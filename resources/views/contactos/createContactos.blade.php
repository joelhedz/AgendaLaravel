<?php
$accion = isset($contactos) ? true : false;
$title = $accion ? 'Editar Contacto' : 'Registrar Contacto';
?>

@extends('layouts.principal')

@section('container')

<main class="container">
    <h1 class="mt-4">{{$title}}</h1>
    <form class="mt-4" action="{{$accion?'/contactos/'.$contactos->id:'/contactos'}}" method="POST">
        @csrf
        @if($accion)
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Id</label>
            <input type="number" name="idPersona" id="idPersona" class="form-control" value="{{$accion?$contactos->id:''}}" readonly>
        </div>
        @endif
        <div class="mb-3">
            <label for="">Cod Persona</label>
            <input type="text" name="codPersona" id="codPersona" class="form-control" value="{{$accion?$contactos->persona_id:$idcontacto}}" readonly>
        </div>

        <div class="mb-3">
            <label for="">numero</label>
            <input type="number" maxlength="8" name="telefono" id="telefono" class="form-control" value="{{$accion?$contactos->telefono:''}}">
        </div>

        <div class="mb-3">
            <label for="">Tipo Telefono</label>
            <select name="tipoTelefono" id="tipoTelefono" class="form-select ">
                <option value="">Seleccione</option>
                <option value="Casa" {{$accion && $contactos->tipo_telefono == 'Casa' ? 'selected' : ''}}>Casa</option>
                <option value="Celular" {{$accion && $contactos->tipo_telefono == 'Celular' ? 'selected' : ''}}>Celular</option>
                <option value="Trabajo" {{$accion && $contactos->tipo_telefono == 'Trabajo' ? 'selected' : ''}}>Trabajo</option>
            </select>

        </div>


        <div class="mb-3 text-center my-5">
            <button type="submit" class="btn btn-primary w-25  ">Confirmar</button>
            <a href="/contactos/{{$accion?$contactos->persona_id: $idcontacto}}" class="btn btn-warning w-25">Cancelar</a>
        </div>

    </form>


</main>

@endsection