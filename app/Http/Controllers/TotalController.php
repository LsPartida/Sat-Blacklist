<?php

namespace App\Http\Controllers;

use App\Models\Cancelado;
use App\Models\Completo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class TotalController extends Controller
{
    public function verificarTotal(Request $request)
    {
        $rfclist = $request->rfc;
        $result = array();
        foreach ($rfclist as $el) {
            $aux = array("Rfc" => $el);
            if (Cancelado::where('rfc', '=', $el)->exists()) {
                $aux = $aux + array("EstatusCancelado" => "Encontrado", "DataCancelado" => Cancelado::where('rfc', '=', $el)->first());
            } else {
                $aux = $aux + array("EstatusCancelado" => "No listado");
            }
            if (Completo::where('rfc', '=', $el)->exists()) {
                $aux = $aux + array("EstatusCompleto" => "Encontrado", "DataCompleto" => Completo::where('rfc', '=', $el)->first());
            } else {
                $aux = $aux + array("EstatusCompleto" => "No listado");
            }
            //            array_push($aux, $resultinterno);
            array_push($result, $aux);
        }
        $result = array("ResponsesStatus" => $result);
        return json_encode($result);
    }
}
