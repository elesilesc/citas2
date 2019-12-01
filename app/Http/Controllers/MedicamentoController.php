<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
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
        $medicamentos = Medicamento::all();

        return view('medicamentos/index',['medicamentos'=>$medicamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicamentos/create');
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
            'nombre' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion' => 'required|max:255',
            'link' => 'required|max:255',
            'tratamiento_id' => 'required|exists:tratamientos,id'
        ]);
        $medicamento = new Medicamento($request->all());
        $medicamento->save();

        // return redirect('especialidades');

        flash('Medicamento creado correctamente');

        return redirect()->route('medicamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $id)
    {
        $medicamento = Medicamento::find($id);

        $tratamientos = Tratamiento::all()->pluck('composicion','id');


        return view('medicamentos/edit',['medicamento'=> $medicamento, 'tratamientos'=>$tratamientos ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion' => 'required|max:255',
            'link' => 'required|max:255',
            'tratamiento_id' => 'required|exists:tratamientos,id'
        ]);

        $medicamento = Medicamento::find($id);
        $medicamento->fill($request->all());

        $medicamento->save();

        flash('Medicamento modificado correctamente');

        return redirect()->route('medicamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicamento $id)
    {
        $medicamento = Medicamento::find($id);
        $medicamento->delete();
        flash('Medicamento borrado correctamente');

        return redirect()->route('medicamentos.index');
    }
}
