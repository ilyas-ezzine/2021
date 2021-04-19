<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin\Gasto;
use App\Models\Admin\ingreso;
use Livewire\WithPagination;
use Livewire\Component;









class IrpfIndex extends Component
{

    use WithPagination;

    public $message;
    public $desde = '2021-01-01';
    public $hasta = '2022-03-31';
    public $ejercicio;
    protected $paginationTheme = 'bootstrap';
    public function updatingmessage()
    {
        $this->resetPage();
    }
    public function render()
    {
        if ($this->message == 't1') {

            $this->desde = $this->ejercicio . '-01-01';
            $this->hasta = $this->ejercicio . '-03-31';
        } elseif ($this->message == 't2') {

            $this->desde = $this->ejercicio . '-04-01';
            $this->hasta = $this->ejercicio . '-06-30';
        } elseif ($this->message == 't3') {

            $this->desde = $this->ejercicio . '-07-01';
            $this->hasta = $this->ejercicio . '-09-30';
        } elseif ($this->message == 't4') {

            $this->desde = $this->ejercicio . '-10-01';
            $this->hasta = $this->ejercicio . '-12-31';
        }

        $ingresos = ingreso::where('fecha', '>=', $this->ejercicio . '01-01')
        ->where('fecha', '<=', $this->hasta)
        ->paginate(20);
        $gastos = Gasto::where('fecha', '>=', $this->ejercicio . '01-01')
        ->where('fecha', '<=', $this->hasta)
        ->paginate(20);

        $sumaG = Gasto::where('fecha', '>=', $this->ejercicio . '01-01')
        ->where('fecha', '<=', $this->hasta)
        /*->where('nif', 'like', '%' . $this->message . '%') */
        ->sum('valor');

        $sumaI = ingreso::where('fecha', '>=', $this->ejercicio . '01-01')
            ->where('fecha', '<=', $this->hasta)
            ->sum('valor');


        return view('livewire.admin.irpf-index', compact('ingresos', 'gastos', 'sumaI', 'sumaG'));
    }
}
