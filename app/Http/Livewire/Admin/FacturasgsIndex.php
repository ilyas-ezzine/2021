<?php

namespace App\Http\Livewire\Admin;
use Livewire\WithPagination;
use App\Models\admin\facturasgasto;
use Livewire\Component;

class FacturasgsIndex extends Component
{
    use WithPagination;

    public $message;
    public $desde;
    public $hasta;
    protected $paginationTheme ='bootstrap';
    public function updatingsearch(){
        $this->resetPage();
    }

    public function render()
    {

        $facturas = facturasgasto::where('NIF', 'like' , '%' . $this->message . '%')
        ->orderByRaw('fecha DESC')->paginate(20);
        if($this->message){       
            $facturas = facturasgasto::where('NIF', 'like' , '%' . $this->message . '%')->paginate();        
       }elseif($this->desde and $this->hasta){
           $facturas= facturasgasto::where('fecha','>',$this->desde)
           ->where('fecha','<',$this->hasta)
           ->paginate(20);
       }
        return view('livewire.admin.facturasgs-index', compact('facturas'));
    }
}
