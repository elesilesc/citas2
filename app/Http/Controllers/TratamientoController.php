<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Tratamiento;
use App\Medicamento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('tratamientos/index',['tratamientos'=>$tratamientos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citas = Cita::all()->pluck('fecha_hora','id');
        $medicamentos = Medicamento::all()->pluck('nombre','id');

        return view('tratamientos/create',['citas'=>$citas], ['medicamentos'=>$medicamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'initTime' => 'required|date|after:now',
            'endTime' => 'required|date|after:now',
            'descripcion' => 'required|max:255',
            'units' => 'required|max:255',
            'frecuencia' => 'required|max:255',
            'instrucciones' => 'required|max:255',
            'cita_id' => 'required|exists:citas,id',
            'medicamento_id' => 'required|exists:medicamentos,id'

        ]);
        $tratamiento = new Tratamiento($request->all());
        $tratamiento->save();


        flash('Tratamiento creado correctamente');

        return redirect()->route('tratamientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tratamiento = Tratamiento::find($id);
        $cita = Cita::all()->pluck('fecha_hora','id');
        $medicamentos = Medicamento::all()->pluck('name','id');

        return view('tratamientos/edit',['tratamiento'=> $tratamiento, 'citas'=>$cita, 'medicamentos'=>$medicamentos ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'initTime' => 'required|date|after:now',
            'endTime' => 'required|date|after:now',
            'descripcion' => 'required|max:255',
            'units' => 'required|max:255',
            'frecuencia' => 'required|max:255',
            'instrucciones' => 'required|max:255',
            'cita_id' => 'required|exists:citas,id',
            'medicamento_id' => 'required|exists:medicamentos,id'

        ]);

        $tratamiento = Tratamiento::find($id);
        $tratamiento->fill($request->all());
        $tratamiento->save();

        flash('Tratamiento modificado correctamente');

        return redirect()->route('tratamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tratamiento = Tratamiento::find($id);
        $tratamiento->delete();
        flash('Tratamiento borrado correctamente');

        return redirect()->route('tratamientos.index');
    }
}
