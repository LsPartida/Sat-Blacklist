<?php

namespace App\Imports;

use App\Models\Completo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CompletoImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        setlocale(LC_ALL, "es-MX");
        return new Completo([
            'rfc'                                                       => $row[1],
            'nombreDelContribuyente'                                    => substr($row[2], 0, 255),
            'situacionDelContribuyente'                                 => $row[3],
            'numeroYFechaDeOficioGlobalDePresuncion'                    => $row[4],
            'publicacionPaginaSatPresuntos'                             => $row[5],
            'numeroYFechaDeOficioGlobalDePresuncion1'                   => $row[6],
            'publicacionDOFPresuntos'                                   => $row[7],
            'publicacionPaginaSATDesvirtuados'                          => $row[8],
            'numeroYFechaDeOficioGlobalDeContribuyentesQueDesvirtuaron' => $row[9],
            'publicacionDOFDesvirtuados'                                => $row[10],
            'numeroYFechaDeOficioGlobalDedefinitivos'                   => $row[11],
            'publicacionPaginaSETDefinitivos'                           => $row[12],
            'publicacionDOFDefinitivos'                                 => $row[13],
            'numeroYFechaDeOficioGlobalDeSentenciaFavorable'            => $row[14],
            'publicacionPaginaSATSentenciaFavorable'                    => $row[15],
            'numeroYFechaDeOficioGlobalDeSentenciaFavorable1'           => $row[16],
            'publicacionDOFSentenciaFavorable'                          => $row[17]
        ]);
    }

    public function startRow(): int
    {
        return 4;
    }
}
