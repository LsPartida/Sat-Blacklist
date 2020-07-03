<?php

namespace App\Imports;

use App\Models\Cancelado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CanceladoImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cancelado([
            'rfc'                     => $row[0],
            'razonSocial'             => substr($row[1], 0, 255),
            'tipoPersona'             => $row[2],
            'supuesto'                => $row[3],
            'fechaPrimeraPublicacion' => $row[4],
            'monto'                   => $row[5],
            'fechaPublicacion'        => $row[6],
            'entidad'                 => $row[7]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
