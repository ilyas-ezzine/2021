<div>
    <div class="card">
       <div class="card-header">
           <input wire:model="message" class="form-control" placeholder="ingrese el NIF de la empresa">
       </div>
       <div class="card-body"><strong>fecha de emision de la factura</strong></div>
       <div class="card-header">
        <input wire:model="desde" type="date" class="form-control" placeholder="Desde">
        <input wire:model="hasta" type="date" class="form-control" placeholder="hasta">
        </div>
     
        <div class="card-body">
            <a type="button" class="btn btn-primary" href="{{route('admin.facturasingresos.create')}}">Añadir Factura</a>
        </div>
        @if ($facturas->count())
            
        <div class="card-body">
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
                    <th>descripcion</th>
                    <th>Documento</th>    
                    <th>Acciones</th>    
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $factura)
                <tr>
                    <td>{{$factura->id}}</td>
                    <td>{{$factura->NIF}}</td>
                    <td>{{$factura->valor}}</td>
                    <td>{{$factura->IVA}}</td>
                    <td>{{$factura->valor * $factura->IVA}}</td>
                    <td>{{$factura->valor + $factura->valor * $factura->IVA }}</td>
                    <td>{{$factura->fecha}}</td>
                    <td>{{$factura->descripcion}}</td>
                    
                
                    <td><a href="">{{$factura->Ruta}}</a></td>
                    
                <td width='10px'><a href="{{route('admin.facturasingresos.edit', $factura)}} " button type="button" class="btn btn-warning">Editar</a></td>
                    

                @endforeach
                </tr>
            </tbody>

        </table>
        </div>
        <div class="card-footer">
             {{$facturas->links()}}
         </div>
        
             
         @else
          <div class="card-body">
              <strong>No hay registros</strong>
        </div>   
           

        @endif
   
    </div>
</div>
