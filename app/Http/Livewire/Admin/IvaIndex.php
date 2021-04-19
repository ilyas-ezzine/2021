<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\admin\facturasgasto;
use App\Models\Admin\facturasingreso;
use Illuminate\Support\Arr;


use Livewire\Component;

class IvaIndex extends Component
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




        $ingresos = facturasingreso::where('fecha', '>=', $this->desde)
            ->where('fecha', '<=', $this->hasta)
            ->paginate(10);
        $gastos = facturasgasto::where('fecha', '>=', $this->desde)
            ->where('fecha', '<=', $this->hasta)

            ->paginate(10);

        $sumaG = facturasgasto::where('fecha', '>=', $this->desde)
            ->where('fecha', '<=', $this->hasta)
            /*->where('nif', 'like', '%' . $this->message . '%') */
            ->sum('valor');
        /*             ->select(facturasgasto::raw('sum(valor) as gasto'), facturasgasto::raw('sum(valor * iva) as IVASoportado'))->get();;
 */
        $sumaI = facturasingreso::where('fecha', '>=', $this->desde)
            ->where('fecha', '<=', $this->hasta)
            ->sum('valor');
        /*->where('nif', 'like', '%' . $this->message . '%') */
        $sumaIVAI = facturasingreso::where('iva', '0.21')
            ->where('fecha', '>=', $this->desde)
            ->where('fecha', '<=', $this->hasta)
            ->sum('valor');
        $sumaIVAg21 = facturasgasto::where('iva', '0.21')
            ->where('fecha', '>=', $this->desde)
            ->where('fecha', '<=', $this->hasta)
            ->sum('valor');
            $sumaIVAg10 = facturasgasto::where('iva', '0.1')
            ->where('fecha', '>=', $this->desde)
            ->where('fecha', '<=', $this->hasta)
            ->sum('valor');


        return view('livewire.admin.iva-index', compact('ingresos', 'gastos', 'sumaG', 'sumaI', 'sumaIVAI', 'sumaIVAg21', 'sumaIVAg10'));
    }
}
