<?php

namespace App\Http\Controllers;

use App\Localizacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;
use Illuminate\Support\Facades\Redirect;


class CitaController extends Controller
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
        $todascitas = Cita::all();
        $citas= array();
        $fecha_actual = Carbon::now()->format('Y-m-d\Th:i h:m');
        foreach($todascitas as $cita){
            if($fecha_actual<$cita->fecha_hora){
                array_push($citas,$cita);
            }
        }

        return view('citas/index',['citas'=>$citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');

        $localizaciones = Localizacion::all()->pluck('full_name','id');

        return view('citas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes, 'localizaciones'=>$localizaciones]);
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
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            'localizacion_id' => 'required|exists:localizacions,id',
        ]);

        $cita = new Cita($request->all());
        $cita->hora_fin = Carbon::parse($request['fecha_hora'])->addMinutes(15);

        $enfesp=$cita->paciente->enfermedad->especialidad;
        $medesp=$cita->medico->especialidad;
        if(($medesp!=$enfesp)) {
            return Redirect::back()->withErrors(['El médico no pertenece a la especialidad de la enfermedad']);
            //flash('El médico no pertenece a la especialidad de la enfermedad');
        }
        else{
            $cita->save();
            flash('Cita creada correctamente');
            return redirect()->route('citas.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citas = Cita::all();
        return view('citas/index', ['citas' => $citas]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');

        $localizaciones = Localizacion::all()->pluck('full_name','id');

        $enfesp=$cita->paciente->enfermedad->especialidad;
        $medesp=$cita->medico->especialidad;

        if(($medesp!=$enfesp)) {
            return Redirect::back()->withErrors(['El médico no pertenece a la especialidad de la enfermedad']);
            //flash('El médico no pertenece a la especialidad de la enfermedad');
        }
        else {

            return view('citas/edit', ['cita' => $cita, 'medicos' => $medicos, 'pacientes' => $pacientes, 'localizaciones' => $localizaciones]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
           // 'localizacion_id' => 'required|exists:localizacions,id',

        ]);

        $cita = Cita::find($id);
        $cita->fill($request->all());

        $cita->hora_fin = Carbon::parse($request['fecha_hora'])->addMinutes(15);

        $enfesp=$cita->paciente->enfermedad->especialidad;
        $medesp=$cita->medico->especialidad;
        if(($medesp!=$enfesp)) {
            return Redirect::back()->withErrors(['El médico no pertenece a la especialidad de la enfermedad']);
            //flash('El médico no pertenece a la especialidad de la enfermedad');
        }
        else{
            $cita->save();
            flash('Cita modificada correctamente');
            return redirect()->route('citas.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
}
