<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\admin\otrogasto;

use Livewire\Component;

class GastosIndex extends Component
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

       /*  $gasto = otrogasto::where('fecha', '>', $this->desde)
            ->where('fecha', '<', $this->hasta)
                        ->paginate(10);

 */
$otrosgastos = otrogasto::where('Fecha', '>', $this->desde)
                    ->where('Fecha', '<', $this->hasta)
                    ->paginate(10);

        return view('livewire.admin.gastos-index', compact('otrosgastos'));
    }
}
