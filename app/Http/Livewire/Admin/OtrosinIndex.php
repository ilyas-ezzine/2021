<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\admin\otrosingreso;

use Livewire\Component;


class OtrosinIndex extends Component
{
    use WithPagination;

    public $message;
    public $desde = '2010-01-01';
    public $hasta = '2030-01-01';
    protected $paginationTheme = 'bootstrap';
    public function updatingsearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $ingresos = otrosingreso::where('Fecha', '>', $this->desde)
            ->where('Fecha', '<', $this->hasta)
            ->where('nif', 'like', '%' . $this->message . '%')
            ->paginate(10);

        return view('livewire.admin.otrosin-index', compact('ingresos'));
        //return view('livewire.admin.otrosin-index');
    }
}
