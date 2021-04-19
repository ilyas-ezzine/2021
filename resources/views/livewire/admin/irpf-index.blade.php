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


            @if ($ingresos->count())

                <div class="card-body  m-4">
                    <h3> partidas de ingresos</h3>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>fecha</th>
                                <th>importe</th>
                                <th>concepto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingresos as $ingreso)

                                <tr>
                                    <td>{{ $ingreso->id }}</td>
                                    <td>{{ $ingreso->Fecha }}</td>
                                    <td>{{ $ingreso->valor }}</td>
                                    <td>{{ $ingreso->Observaciones }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $ingresos->links() }}
                </div>

                <div class="card-body  m-4">
                    <h3> partidas de gastos</h3>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>fecha</th>
                                <th>importe</th>
                                <th>concepto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gastos as $gasto)

                                <tr>
                                    <td>{{ $gasto->id }}</td>
                                    <td>{{ $gasto->Fecha }}</td>
                                    <td>{{ $gasto->valor }}</td>
                                    <td>{{ $gasto->Observaciones }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $gastos->links() }}
                </div>



                <div class="card-body bg-info m-4">
                    <h2 class="text-justify"> balance entre fechas: {{ $desde }} y {{ $hasta }}
                    </h2>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>suma de ingresos</th>
                                <th>suma de gastos</th>
                                <th>Diferencia  </th>
                                <th>Total pagado antes</th>
                                <th>total a pagar </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $sumaI }}</td>
                                <td>{{ $sumaG }}</td>
                                <td>{{ $sumaI - $sumaG  }}</td>
                                <td></td>
                                <td>{{ $sumaI - $sumaG }}</td>
                            </tr>
                </div>
            </div>

                            @else
                                <div class="card-body">
                                    <strong>No hay registros</strong>
                                </div>


            @endif

        </div>
    </div>
