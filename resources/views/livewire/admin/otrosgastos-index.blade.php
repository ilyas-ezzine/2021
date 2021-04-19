<div>
    <div class="card">
       <div class="card-header">
           <input wire:model="message" class="form-control" placeholder="ingrese el NIF de la empresa">
       </div>
       <div class="card-body"><strong>fecha de emision del recibo</strong></div>
       <div class="card-header">
        <input wire:model="desde" type="date" class="form-control" placeholder="Desde">
        <input wire:model="hasta" type="date" class="form-control" placeholder="hasta">
        </div>
     
        <div class="card-body">
            <button class="btn btn-success" ><a href="{{route('admin.otrosgastosgastos.create')}}">Añadir otrosgasto</a></button>
        </div>
        @if ($otrosgastos->count())
            
        <div class="card-body">
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Numero de gasto</th>
                    <th>NIF</th>
                    <th>valor</th>                    
                    <th>Fecha</th>
                    <th>descripcion</th>
                    <th>Documento</th>    
                        
                </tr>
            </thead>
            <tbody>
                @foreach ($otrosgastos as $otrosgasto)
                <tr>
                    <td>{{$otrosgasto->id}}</td>
                    <td>{{$otrosgasto->NIF}}</td>
                    <td>{{$otrosgasto->valor}}</td>
                    
                    
                    <td>{{$otrosgasto->fecha}}</td>
                    <td>{{$otrosgasto->descripcion}}</td>
                    
                
                    <td><a href="">{{$otrosgasto->Ruta}}</a></td>
                    
                <td width='10px'><a href="{{route('admin.otrosgastosgastos.edit', $otrosgasto)}} " button type="button" class="btn btn-warning">Editar</a></td>
                    

                @endforeach
                </tr>
            </tbody>

        </table>
        </div>
        <div class="card-footer">
             {{$otrosgastos->links()}}
         </div>
        
             
         @else
          <div class="card-body">
              <strong>No hay registros</strong>
        </div>   
           

        @endif
   
    </div>
</div>