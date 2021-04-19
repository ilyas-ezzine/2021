<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card">
        <div class="card-header">
            <input wire:model="message" class="form-control" placeholder="ingrese id del trabajador">
        </div>
        <div class="card-body"><strong>fecha de emision de la factura</strong></div>
        <div class="card-header">
            <input wire:model="desde" type="date" class="form-control" placeholder="desde">
            <input wire:model="hasta" type="date" class="form-control" placeholder="hasta">
        </div>

        <div class="card-body">
            <button class="btn btn-success"><a href="{{ route('admin.nominas.create') }}">Añadir nomina</a></button>
        </div>
        @if ($nominas->count())

            <div class="card-body">
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nombre</th>
                            <th>Apellidos</th>
                            <th>nº empleado</th>
                            <th>salario</th>
                            <th>retenciones</th>
                            <th>total percibido</th>
                            <th>fecha</th>
                            <th>Observaciones</th>
                            <th>Documento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nominas as $nomina)
                       
                            <tr> <td>{{ $nomina->id }}</td>
                                <td>{{ $nomina->empleado->Nombre }}</td>
                                <td>{{ $nomina->empleado->Apellidos }}</td>
                                <td>{{ $nomina->empleado_id }}</td>
                                <td>{{ $nomina->valor }}</td>
                                <td>{{ $nomina->retenciones }}</td>
                                <td>{{ $nomina->valor - $nomina->retenciones }}</td>
                                <td>{{ $nomina->Fecha }}</td>
                                <td>{{ $nomina->Observaciones }}</td>




                                <td><a href="{{route('admin.nominas.download',$nomina->id)}}" >                            
                                    {{$nomina->ruta}}</a></td>

                                <td width='10px'><a href="{{ route('admin.nominas.edit', $nomina) }} " button
                                        type="button" class="btn btn-warning">Editar</a></td>


                        @endforeach
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                {{ $nominas->links() }}
            </div>


        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>


        @endif

    </div>

</div>
