@extends('layouts.principal')

@section('container')

<main>
    <h1 class="bg-body-secondary text-center  p-3 ">Modulo Personas</h1>
    <section class="container mt-4 ">
        <a href="/personas/create" class="btn btn-primary">Registrar Nuevo Persona</a>

        <div class="mt-3">
            <table class="table table-striped table-hover table-borderless  align-middle">
                <thead class="table-light bg-primary ">
                    <caption>
                        Personas
                    </caption>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha Nacimiento</th>
                        <th>Genero</th>
                        <th>Direccion</th>
                        <th class="text-center ">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider fw-light ">
                    @foreach ($personas as $data)
                    <tr>
                        <th class="fw-medium ">{{$data->id}}</th>
                        <th class="fw-medium ">{{$data->nombre}}</th>
                        <th class="fw-medium ">{{$data->apellido}}</th>
                        <th class="fw-medium ">{{$data->fecha_nacimiento}}</th>
                        <th class="fw-medium ">{{$data->genero}}</th>
                        <th class="fw-medium ">{{$data->dirrecion}}</th>
                        <th class="text-center d-flex gap-4 justify-content-center ">
                            <a href="personas/{{$data->id}}/edit" class="btn btn-warning">Editar</a>
                            <a href="/contactos/{{$data->id}}" class="btn btn-success text-light">Telfonos</a>
                            <a href="/correos/{{$data->id}}" class="btn btn-success text-light">Correos</a>
                            <button type="button" class="btn btn-danger eliminarPersona" data-id="{{$data->id}}" data-nombre="{{$data->nombre}}" data-bs-toggle="modal" data-bs-target="#exampleModal" name="">
                                Eliminar
                            </button>

                        </th>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </section>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Desea Eliminar a <span id="nombrePersona"></span></h1>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="EliminarPersona" action="formEliminar" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" value="Eliminar">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.eliminarPersona').forEach(button => {
            button.addEventListener('click', function() {
                // Obtenemos el nombre y id del empleado desde el atributo de datos
                const idPersona = this.getAttribute('data-id');
                const nombrePersona = this.getAttribute('data-nombre');
                // Mostramos el nombre del empleado en el modal
                document.getElementById('nombrePersona').innerText = nombrePersona;
                document.getElementById('EliminarPersona').setAttribute('action', '/personas/' + idPersona)
            });
        });
    </script>


</main>



@endsection