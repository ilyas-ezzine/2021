<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card">
        <div class="card-header">
            <input wire:model="message" class="form-control" placeholder="ingrese el nombre o apellidos del empleado">
        </div>
        <div class="card-body">
            <a class='btn btn-sm btn-primary' href="{{ route('admin.empleados.create') }}">Añadir
                    empleado</a></button>
        </div>

        @if ($empleados->count())
            <div class="card-body">
                <table class='table table-striped '>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>nombre</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>F. Nacimiento</th>
                            <th>F. Alta</th>
                            <th>F. Baja</th>
                            <th>NAF</th>
                            <th>Documento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->id }}</td>
                                <td>{{ $empleado->Nombre }}</td>
                                <td>{{ $empleado->Apellidos }}</td>
                                <td>{{ $empleado->NIF }}</td>
                                <td>{{ $empleado->FechaNac }}</td>
                                <td>{{ $empleado->FechaAlta }}</td>
                                <td>{{ $empleado->FechaBaja }}</td>
                                <td>{{ $empleado->NSS }}</td>
                                <td width='width: 130px'><a href="{{route('admin.empleados.download',$empleado->id)}}">{{ $empleado->ruta }}</a></td>
                                <td width='20px' class='d-flex align-items-center'><a class='btn btn-sm btn-primary'
                                        href="{{ route('admin.empleados.edit', $empleado) }}">Editar</a>

                                </td>

                            </tr>


                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                {{ $empleados->links() }}
            </div>

        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>

        @endif


    </div>

</div>
