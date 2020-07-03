<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancelado extends Model 
{
	protected $fillable = ['rfc', 'razonSocial', 'tipoPersona', 'supuesto', 'fechaPrimeraPublicacion', 'monto', 'fechaPublicacion', 'entidad'];

    public static function truncateTbCancelado()
	{
	    $cancelados = static::truncate();
	    return true;
	}

	public static function verificarCancelados($rfc)
	{
		return static::where("rfc", "=", $rfc)->first();
	}
}
