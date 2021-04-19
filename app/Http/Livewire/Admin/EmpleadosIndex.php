<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\admin\Empleado;


class EmpleadosIndex extends Component
{
    use WithPagination;

    public $message;
    public function updatingmessage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $empleados = empleado::where('nombre', 'like', '%' . $this->message . '%')
            ->orwhere('apellidos', 'like', '%' . $this->message . '%')->paginate(10);
        return view('livewire.admin.empleados-index', compact('empleados'));
    }
}
