<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persona =  Persona::all();
        return view('personas.index')->with('personas', $persona);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personas.createPersonas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
        $persona->genero = $request->get('genero');
        $persona->direccion = $request->get('direccion');

        $persona->save();

        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $idPersona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $idPersona)
    {
        $persona = Persona::find($idPersona);
        return view('personas.createPersonas')->with('personas', $persona);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $idPersona)
    {
        $persona = Persona::find($idPersona);
        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
        $persona->genero = $request->get('genero');
        $persona->direccion = $request->get('direccion');

        $persona->save();

        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $idPersona)
    {
        $persona = Persona::find($idPersona);
        $persona->delete();

        return redirect('/personas');
    }
}
