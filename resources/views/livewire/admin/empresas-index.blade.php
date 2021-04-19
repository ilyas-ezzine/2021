<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card">
        <div class="card-header">
            <input wire:model="message" class="form-control" placeholder="ingrese el NIF o la denominación de la empresa">
        </div>
        <div class="card-body">
            <button class="btn btn-success" ><a href="{{route('admin.empresas.create')}}">Añadir Empresa</a></button>
        </div>
       
     @if ($empresas->count())
     <div class="card-body">
         <table class='table table-striped'>
             <thead>
                 <tr>
                     <th>Id</th>
                     <th>Nif</th>
                     <th>Denominación</th>
                     <th>Dirección</th>
                     <th></th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($empresas as $empresa)
                 <tr >
                     <td>{{$empresa->id}}</td>
                     <td>{{$empresa->NIF}}</td>
                     <td>{{$empresa->Denominacíon}}</td>
                     <td>{{$empresa->Direccion}}</td>
                     <td width='10px'><a class='btn btn-primary' href="{{route('admin.empresas.edit',$empresa)}}">Editar</a></td>
                 </tr>
                     
 
                 @endforeach
             </tbody>
 
         </table>
     </div>
     <div class="card-footer">
         {{$empresas->links()}}
     </div>
         
     @else
     <div class="card-body">
         <strong>No hay registros</strong>
     </div>
         
     @endif
         
    
    </div>
</div>
