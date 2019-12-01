<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('initTime');
            $table->dateTime('endTime');
            $table->String('descripcion');
            $table->String('units');
            $table->String('frecuencia');
            $table->String('instrucciones');
            $table->unsignedInteger('cita_id');
            $table->unsignedInteger('medicamento_id');
            $table->timestamps();
            $table->foreign('cita_id')->references('id')->on('citas');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
}