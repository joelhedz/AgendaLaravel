@extends('layouts.principal')

@section('container')

<main>
    <h1 class="bg-body-secondary text-center  p-3 ">Contactos {{$contactoNombre->nombre}}</h1>
    <section class="container mt-4 ">
        <a href="/correos/create/{{$contactoNombre->id}}" class="btn btn-primary">Registrar Correo</a>

        <div class="mt-3">
            <table class="table table-striped table-hover table-borderless  align-middle">
                <thead class="table-light bg-primary ">
                    <caption>
                        Correos
                    </caption>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo </th>
                        <th>Tipo Telefono</th>
                        <th class="text-center ">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider fw-light ">
                    @foreach ($correos as $data)
                    <tr>
                        <th class="fw-medium ">{{$data->id}}</th>
                        <th class="fw-medium ">{{$contactoNombre->nombre.' '.$contactoNombre->apellido}}</th>
                        <th class="fw-medium ">{{$data->correo}}</th>
                        <th class="fw-medium ">{{$data->tipo_correo}}</th>

                        <th class="text-center d-flex gap-4 justify-content-center ">
                            <a href="/correos/{{$data->id}}/edit" class="btn btn-warning">Editar</a>
                            <button type="button" class="btn btn-danger eliminarCorreo" data-id="{{$data->id}}" data-nombre="{{$contactoNombre->nombre}}" data-bs-toggle="modal" data-bs-target="#exampleModal" name="">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Desea Eliminar este correo de <span id="nombreContacto"></span></h1>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="EliminarCorreo" action="formEliminar" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" value="Eliminar">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.eliminarCorreo').forEach(button => {
            button.addEventListener('click', function() {
                // Obtenemos el nombre y id del empleado desde el atributo de datos
                const idContacto = this.getAttribute('data-id');
                const nombreContacto = this.getAttribute('data-nombre');
                // Mostramos el nombre del empleado en el modal
                document.getElementById('nombreContacto').innerText = nombreContacto;
                document.getElementById('EliminarCorreo').setAttribute('action', '/correos/' + idContacto)
            });
        });
    </script>


</main>



@endsection