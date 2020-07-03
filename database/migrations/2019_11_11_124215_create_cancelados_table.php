<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanceladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancelados', function (Blueprint $table) {
            $table->bigIncrements('idCancelado');
            $table->string('rfc',13);
            $table->string('razonSocial')->nullable();
            $table->string('tipoPersona')->nullable();
            $table->string('supuesto')->nullable();
            $table->string('fechaPrimeraPublicacion',100)->nullable();
            $table->string('monto')->nullable();
            $table->string('fechaPublicacion',100)->nullable();
            $table->string('entidad')->nullable();
            $table->timestamps();
        });
        Schema::create('completos', function (Blueprint $table) {
            $table->bigIncrements('idCompleto');
            $table->string('rfc',13);
            $table->string('nombreDelContribuyente',500)->nullable();
            $table->string('situacionDelContribuyente')->nullable();
            $table->string('numeroYFechaDeOficioGlobalDePresuncion')->nullable();
            $table->string('publicacionPaginaSatPresuntos',100)->nullable();
            $table->string('numeroYFechaDeOficioGlobalDePresuncion1')->nullable();
            $table->string('publicacionDOFPresuntos',100)->nullable();
            $table->string('publicacionPaginaSATDesvirtuados',100)->nullable();
            $table->string('numeroYFechaDeOficioGlobalDeContribuyentesQueDesvirtuaron')->nullable();
            $table->string('publicacionDOFDesvirtuados',100)->nullable();
            $table->string('numeroYFechaDeOficioGlobalDedefinitivos')->nullable();
            $table->string('publicacionPaginaSETDefinitivos',100)->nullable();
            $table->string('publicacionDOFDefinitivos',100)->nullable();
            $table->string('numeroYFechaDeOficioGlobalDeSentenciaFavorable')->nullable();
            $table->string('publicacionPaginaSATSentenciaFavorable',100)->nullable();
            $table->string('numeroYFechaDeOficioGlobalDeSentenciaFavorable1')->nullable();
            $table->string('publicacionDOFSentenciaFavorable',100)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancelados');
        Schema::dropIfExists('completos');
    }
}
