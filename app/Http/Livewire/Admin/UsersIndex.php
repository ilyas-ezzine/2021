<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    public $message;
    public $desde;
    public $hasta;
    public function updatingmessage(){
        $this->resetPage();
    }
    public function Updatingdesde(){
        $this->resetPage();
    }


    protected $paginationTheme ='bootstrap';
    
    public function render()
    {    $users = User::where('name', 'like' , '%' . $this->message . '%')->paginate();
        if($this->message){       
             $users = User::where('name', 'like' , '%' . $this->message . '%')->paginate();        
        }elseif($this->desde and $this->hasta){
            $users= User::where('created_at','>',$this->desde)
            ->where('created_at','<',$this->hasta)
            ->paginate();
        }
        
        return view('livewire.admin.users-index', compact('users'));
    }
}