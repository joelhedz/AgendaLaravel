@extends('layouts.principal')

@section('container')

<main>
    <h1 class="bg-body-secondary text-center  p-3 ">Contactos {{$contactoNombre->nombre}}</h1>
    <section class="container mt-4 ">
        <a href="/contactos/create/{{$contactoNombre->id}}" class="btn btn-primary">Registrar Telefono</a>

        <div class="mt-3">
            <table class="table table-striped table-hover table-borderless  align-middle">
                <thead class="table-light bg-primary ">
                    <caption>
                        Personas
                    </caption>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Numero </th>
                        <th>Tipo Telefono</th>
                        <th class="text-center ">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider fw-light ">
                    @foreach ($contactos as $data)
                    <tr>
                        <th class="fw-medium ">{{$data->id}}</th>
                        <th class="fw-medium ">{{$contactoNombre->nombre.' '.$contactoNombre->apellido}}</th>
                        <th class="fw-medium ">{{$data->telefono}}</th>
                        <th class="fw-medium ">{{$data->tipo_telefono}}</th>

                        <th class="text-center d-flex gap-4 justify-content-center ">
                            <a href="/contactos/{{$data->id}}/edit" class="btn btn-warning">Editar</a>
                            <button type="button" class="btn btn-danger eliminarContacto" data-id="{{$data->id}}" data-nombre="{{$contactoNombre->nombre}}" data-bs-toggle="modal" data-bs-target="#exampleModal" name="">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Desea Eliminar este numero de <span id="nombreContacto"></span></h1>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="EliminarContacto" action="formEliminar" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" value="Eliminar">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.eliminarContacto').forEach(button => {
            button.addEventListener('click', function() {
                // Obtenemos el nombre y id del empleado desde el atributo de datos
                const idContacto = this.getAttribute('data-id');
                const nombreContacto = this.getAttribute('data-nombre');
                // Mostramos el nombre del empleado en el modal
                document.getElementById('nombreContacto').innerText = nombreContacto;
                document.getElementById('EliminarContacto').setAttribute('action', '/contactos/' + idContacto)
            });
        });
    </script>


</main>



@endsection