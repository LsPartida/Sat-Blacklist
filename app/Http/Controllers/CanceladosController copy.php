<?php

namespace App\Http\Controllers;

use App\Models\Cancelado;
use Illuminate\Http\Request;
use App\Imports\CanceladoImport;
use Maatwebsite\Excel\Facades\Excel;

class CanceladosController extends Controller
{

    public function descargarCancelados(Request $request)
    {
        $url = 'http://omawww.sat.gob.mx/cifras_sat/Documents/Cancelados.csv';
        $source = file_get_contents($url);
        file_put_contents(public_path("Cancelados.csv"), $source);
        echo 'Se ha descargado el CSV';
    }


    public function importarCancelados(Request $request)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', -1);
        Cancelado::truncateTbCancelado();
        Excel::import(new CanceladoImport, 'Cancelados.csv', NULL, \Maatwebsite\Excel\Excel::CSV);
        dd("Bien");
    }

    public function verificarCancelado(Request $request)
    {
        $rfclist = $request->rfc;
        $result = array();
        foreach ($rfclist as $el) {
            if (Cancelado::where('rfc', '=', $el)->exists()) {
                array_push($result, array("Estatus" => "Encontrado", "Data" => Cancelado::where('rfc', '=', $request->rfc)->first()));
            } else {
                array_push($result, array("Estatus" => "No listado"));
            }
        }
        $result = array("ResponsesStatus" => $result);
        return json_encode($result);
    }
}
