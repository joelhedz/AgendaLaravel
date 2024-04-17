<?php
$fechaActual = date('Y-m-d');
?>

@extends('layouts.principal')

@section('container')

<div class="container-fluid d-flex align-items-center justify-content-center vh-100">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Agenda Contactos</h1>
            <h3>{{$fechaActual}}</h3>
        </div>
    </div>
</div>


@endsection