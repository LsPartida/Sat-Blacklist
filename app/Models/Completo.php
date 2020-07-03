<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Completo extends Model 
{
	protected $fillable = ['rfc','nombreDelContribuyente','situacionDelContribuyente','numeroYFechaDeOficioGlobalDePresuncion','publicacionPaginaSatPresuntos','numeroYFechaDeOficioGlobalDePresuncion1','publicacionDOFPresuntos','publicacionPaginaSATDesvirtuados','numeroYFechaDeOficioGlobalDeContribuyentesQueDesvirtuaron','publicacionDOFDesvirtuados','numeroYFechaDeOficioGlobalDedefinitivos','publicacionPaginaSETDefinitivos','publicacionDOFDefinitivos','numeroYFechaDeOficioGlobalDeSentenciaFavorable','publicacionPaginaSATSentenciaFavorable','numeroYFechaDeOficioGlobalDeSentenciaFavorable1','publicacionDOFSentenciaFavorable'];

    public static function truncateTbCompleto()
	{
	    $completos = static::truncate();
	    return true;
	}

	public static function verificarCompleto($rfc)
	{
		return static::where("rfc", "=", $rfc)->first();
	}
}
