<?php

namespace App\Http\Livewire\Admin;
use Livewire\WithPagination;
use App\Models\admin\empresa;

use Livewire\Component;

class EmpresasIndex extends Component
{
    use WithPagination;

    public $message;
    public function updatingmessage(){
        $this->resetPage();}

    public function render()
    {
        $empresas = Empresa::where('NIF', 'like' , '%' . $this->message . '%')
                            ->orwhere('denominacíon', 'like', '%' . $this->message . '%')->paginate(10);

        return view('livewire.admin.empresas-index', compact('empresas'));
    }
}
