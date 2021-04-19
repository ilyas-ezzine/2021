<?php

use App\Http\Controllers\admin\empleadoController;
use App\Http\Controllers\admin\EmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FacturagastoController;
use App\Http\Controllers\Admin\FacturasingresoController;
use App\Http\Controllers\admin\NominaController;
use App\Http\Controllers\Admin\otrogastoController;
use App\Http\Controllers\Admin\otroingresoController;
use App\Http\Controllers\Admin\ImpuestoController;









Route::get('', [HomeController::class,'index'])->name('home');

Route::resource('empresa',EmpresaController::class)->names('admin.empresas');
Route::get('impuestos/iva', [ImpuestoController::class,'iva'])->name('impuestos.iva');
Route::get('impuestos/irpf', [ImpuestoController::class,'irpf'])->name('impuestos.irpf');
Route::get('impuestos/Retentrabajadores', [ImpuestoController::class,'retencionestrabajadores'])->name('impuestos.111');





Route::resource('user',UserController::class)->names('admin.users');
Route::resource('facturasgasto',FacturagastoController::class)->names('admin.facturasgastos');

Route::resource('nomina',NominaController::class)->names('admin.nominas');
route::get('nomina/{id}/download',[nominaController::class,'download'])->name('admin.nominas.download');

Route::resource('empleado',EmpleadoController::class)->names('admin.empleados');
route::get('empleado/{id}/download',[empleadoController::class,'download'])->name('admin.empleados.download');

Route::resource('otrogasto',otrogastoController::class)->names('admin.otrosgastos');
route::get('otrogasto/{id}/download',[otrogastoController::class,'download'])->name('admin.otrosgastos.download');

Route::resource('facturasingreso',FacturasIngresoController::class)->names('admin.facturasingresos');
route::get('FacturasIngreso/{id}/download',[FacturasIngresoController::class,'download'])->name('admin.facturasingresos.download');

Route::resource('otroingreso',otroIngresoController::class)->names('admin.otrosingresos');
route::get('otroingreso/{id}/download',[otroIngresoController::class,'download'])->name('admin.otrosingresos.download');


Route::get('perfil', function () {
    return view('admin.perfil');
})->name('admin.perfil');
