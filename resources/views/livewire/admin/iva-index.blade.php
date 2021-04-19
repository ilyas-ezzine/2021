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
        @if ($gastos->count() && $ingresos->count())

            <div class="card-body  m-4">
                <h3> Facturas de gastos</h3>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Numero de factura</th>
                            <th>NIF</th>
                            <th>valor</th>
                            <th>IVA</th>
                            <th>Valor IVA</th>
                            <th>Total de la Factura</th>
                            <th>Fecha</th>
                            <th> Descripcion</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gastos as $gasto)
                            <tr>
                                <td>{{ $gasto->id }}</td>
                                <td>{{ $gasto->NIF }}</td>
                                <td>{{ $gasto->valor }}</td>
                                <td>{{ $gasto->IVA }}</td>
                                <td>{{ $gasto->valor * $gasto->IVA }}</td>
                                <td>{{ $gasto->valor + $gasto->valor * $gasto->IVA }}</td>
                                <td>{{ $gasto->fecha }}</td>
                                <td>{{ $gasto->descripcion }}</td>


                        @endforeach
                        </tr>
                    </tbody>

                </table>



                <div class="card-body  m-4">

                    <h3> Facturas de ingresos</h3>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>Numero de factura</th>
                                <th>NIF</th>
                                <th>valor</th>
                                <th>IVA</th>
                                <th>Valor IVA</th>
                                <th>Total de la Factura</th>
                                <th>Fecha</th>
                                <th> Descripcion</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingresos as $ingreso)
                                <tr>
                                    <td>{{ $ingreso->id }}</td>
                                    <td>{{ $ingreso->NIF }}</td>
                                    <td>{{ $ingreso->valor }}</td>
                                    <td>{{ $ingreso->IVA }}</td>
                                    <td>{{ $ingreso->valor * $ingreso->IVA }}</td>
                                    <td>{{ $ingreso->valor + $ingreso->valor * $ingreso->IVA }}</td>
                                    <td>{{ $ingreso->fecha }}</td>
                                    <td>{{ $ingreso->descripcion }}</td>


                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-body bg-info m-4">
                        <h2 class="text-justify"> balance entre fechas: {{ $desde }} y {{ $hasta }}
                        </h2>
                        <table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th>suma de ingresos</th>
                                    <th>Iva repercutido</th>
                                    <th>suma de gastos </th>
                                    <th>IVA soportado</th>
                                    <th>total a pagar </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $sumaI }}</td>
                                    <td>{{ $sumaIVAI * 0.21 }}</td>
                                    <td>{{ $sumaG }}</td>
                                    <td>{{ $sumaIVAg10 * 0.1 + $sumaIVAg21 * 0.21 }}</td>
                                    <td>{{ $sumaIVAI * 0.21 - ($sumaIVAg10 * 0.1 + $sumaIVAg21 * 0.21) }}</td>
                                </tr>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $gastos->links() }}
                </div>


            @else
                <div class="card-body">
                    <strong>No hay Facturas en este periodo</strong>
                </div>


        @endif

    </div>
</div>
