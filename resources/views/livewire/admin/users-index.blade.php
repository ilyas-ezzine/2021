<div>
    <div class="card">
       <div class="card-header">
           <input wire:model="message" class="form-control" placeholder="ingrese el nombre o email de un usuario">
       </div>
       <div class="card-header">
        <input wire:model="desde" type="date" class="form-control" placeholder="Desde">
        <input wire:model="hasta" type="date" class="form-control" placeholder="hasta">
    </div>
      
    @if ($users->count())
    <div class="card-body">
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr >
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td width='10px'><a class='btn btn-primary' href="{{route('admin.users.edit',$user)}}">Editar</a></td>
                </tr>
                    

                @endforeach
            </tbody>

        </table>
    </div>
    <div class="card-footer">
        {{$users->links()}}
    </div>
        
    @else
    <div class="card-body">
        <strong>No hay registros</strong>
    </div>
        
    @endif
        
   
   </div>
</div>
