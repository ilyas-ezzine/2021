<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="message" class="form-control" placeholder="ingrese el trimestre : t1 o t2 ..">
        </div>
        <div class="card-header">
            <input type="number" step="1" class="form-control" wire:model="ejercicio" min='2016'
                placeholder="ingrese el Ejercicio">
        </div>

        <div class="card-body">
            <button class="btn btn-primary"><a href="{{ route('admin.otrosgastos.create') }}">Añadir
                    otrosgasto</a></button>
        </div>
        @if ($nominas->count())

            <div class="card-body  m-4">
                <h3> Facturas de gastos</h3>
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

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nominas as $nomina)

                            <tr>
                                <td>{{ $nomina->id }}</td>
                                <td>{{ $nomina->empleado->Nombre }}</td>
                                <td>{{ $nomina->empleado->Apellidos }}</td>
                                <td>{{ $nomina->empleado_id }}</td>
                                <td>{{ $nomina->valor }}</td>
                                <td>{{ $nomina->retenciones }}</td>
                                <td>{{ $nomina->valor - $nomina->retenciones }}</td>
                                <td>{{ $nomina->Fecha }}</td>


                        @endforeach
                        </tr>
                    </tbody>

                     

                </table>
            </div>
            <div class="card-body bg-info m-4">
                <h2 class="text-justify"> balance entre fechas: {{ $desde }} y {{ $hasta }}
                </h2>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Suma de salarios</th>
                            <th> suma de retenciones</th>
                            <th>numero de perceptores</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $salarios }}</td>
                            <td>{{ $retenciones }}</td>
                            <td>{{ $perceptores }}</td>

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
