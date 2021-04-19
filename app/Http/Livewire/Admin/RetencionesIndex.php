<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin\Gasto;
use App\Models\Admin\ingreso;
use App\Models\Admin\Nomina;
use Livewire\Component;
use Livewire\WithPagination;


class RetencionesIndex extends Component
{
    use WithPagination;

    public $message;
    public $desde = '2021-01-01';
    public $hasta = '2022-03-31';
    public $ejercicio;
    protected $paginationTheme = 'bootstrap';
    public function updatingsearch()
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


        /* ----- las tablas de gastos y ingresos */

        $nominas = Nomina::where('fecha', '>=', $this->desde)
        ->where('fecha', '<=', $this->hasta)
        ->paginate(10);

        $salarios = Nomina::where('fecha', '>=', $this->desde)
        ->where('fecha', '<=', $this->hasta)
        ->sum('valor');

        $retenciones =  Nomina::where('fecha', '>=', $this->desde)
        ->where('fecha', '<=', $this->hasta)
        ->sum('retenciones');

        $perceptores =  Nomina::where('fecha', '>=', $this->desde)
        ->where('fecha', '<=', $this->hasta)
        ->distinct('empleado_id')
        ->count();


            




        return view('livewire.admin.retenciones-index',compact('nominas', 'salarios', 'retenciones', 'perceptores') );
    }
}
