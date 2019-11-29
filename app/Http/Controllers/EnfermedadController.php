<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
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
        //
        $enfermedades = Enfermedad::all();

        return view('enfermedades/index')->with('enfermedades', $enfermedades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('enfermedades/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        //
        $enfermedad = new Enfermedad($request->all());
        $enfermedad->save();
        // return redirect('enfermedades');

        flash('Enfermedad creada correctamente');

        return redirect()->route('enfermedades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $enfermedad = Enfermedad::find($id);

        return view('enfermedad/edit')->with('enfermedad', $enfermedad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $enfermedad = Enfermedad::find($id);
        $enfermedad->fill($request->all());

        $enfermedad->save();

        flash('Enfermedad modificada correctamente');

        return redirect()->route('enfermedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $enfermedad = Enfermedad::find($id);
        $enfermedad->delete();
        flash('Enfermedad borrada correctamente');

        return redirect()->route('enfermedades.index');
    }

    public function destroyAll()
    {
        Enfermedad::truncate();
        flash('Todas las enfermedades borradas correctamente');

        return redirect()->route('enfermedades.index');
    }
}
