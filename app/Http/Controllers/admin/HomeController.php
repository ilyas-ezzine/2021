<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\facturasgasto;
use App\Models\Admin\facturasingreso;
use App\Models\Admin\Gasto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
/*     $facturasingresos = facturasingreso::whereYear('fecha', '2021')->get();
 */

    $facturasingresos = db::select('select sum(valor) as aggregate, ELT(MONTH(fecha), "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre")  as mes from facturasingresos where year(fecha) = "2021"  group by mes order by fecha' );
   /*  $facturasgastos = Gasto::whereYear('fecha', '2021')
    ->groupByRaw('Observaciones')->sum('valor');
 */
    $facturasgastos = DB::select('select Observaciones, sum(valor) as aggregate from totalgastos where fecha >= "2021-01-01" and `fecha` <= "2021-12-31" group by Observaciones');


    return view('admin.index',['facturasgastos'=>$facturasgastos],['facturasingresos'=>$facturasingresos] /* compact('facturasingresos') */ );
  }
}
