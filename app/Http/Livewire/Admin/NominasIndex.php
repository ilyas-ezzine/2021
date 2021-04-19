<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\admin\Nomina;
use App\Models\admin\empleado;
use Livewire\Component;

class nominasIndex extends Component
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
        $empleados = empleado::all();
        /* $nominas = Nomina::where('empleado_id', 'like', '%' . $this->message . '%')
            ->orderByRaw('fecha DESC')->paginate(10);
        if ($this->message) {
            $nominas = Nomina::where('empleado_id', 'like', '%' . $this->message . '%')->paginate();
        } elseif ($this->desde and $this->hasta) */ 
            $nominas = Nomina::where('fecha', '>', $this->desde)
                ->where('fecha', '<', $this->hasta)
                ->where('empleado_id', 'like', '%' . $this->message . '%')
                ->paginate(10);
        /* } */
        return view('livewire.admin.nominas-index', compact('nominas', 'empleados'));
    }
}
