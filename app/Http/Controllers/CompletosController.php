<?php

namespace App\Http\Controllers;

use App\Models\Completo;
use Illuminate\Http\Request;
use App\Imports\CompletoImport;
use Maatwebsite\Excel\Facades\Excel;

class CompletosController extends Controller
{
    public function descargarCompletos(Request $request)
    {
        $url = 'http://omawww.sat.gob.mx/cifras_sat/Documents/Listado_Completo_69-B.csv';
        $source = file_get_contents($url);
        file_put_contents(public_path("Listado_Completo_69-B.csv"), $source);
        echo 'Se ha descargado el CSV';
    }
    public function importarCompletos(Request $request)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', -1);
        Completo::truncateTbCompleto();
        Excel::import(new CompletoImport, 'Listado_Completo_69-B.csv', NULL, \Maatwebsite\Excel\Excel::CSV);
        dd("Bien");
    }
    // Log de conexiones
    public function verificarCompleto(Request $request)
    {
        $rfclist = $request->rfc;
        $result = array();

        foreach ($rfclist as $el) {
            if (Completo::where('rfc', '=', $el)->exists()) {
                array_push($result, array("Estatus" => "Encontrado", "Data" => Completo::where('rfc', '=', $request->rfc)->first()));
            } else {
                array_push($result, array("Estatus" => "No listado"));
            }
        }
        $result = array("ResponsesStatus" => $result);
        return json_encode($result);
    }
}
