<?php

namespace App\Http\Controllers;

use App\Models\Correo;
use App\Models\Persona;
use Illuminate\Http\Request;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $idcontacto)
    {
        return view('correos.createCorreo')->with('idcontacto', $idcontacto);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $correos = new Correo();
        $correos->persona_id = $request->get('codPersona');
        $correos->correo = $request->get('correo');
        $correos->tipo_correo = $request->get('tipoCorreo');
        $correos->save();

        return redirect("/correos/" . $correos->persona_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idcorreo)
    {
        $contactoNombre = Persona::find($idcorreo);
        $correos = Correo::where('persona_id', $idcorreo)->get();
        return view('correos.index')->with('correos', $correos)->with('contactoNombre', $contactoNombre);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idcorreo)
    {
        $correos = Correo::find($idcorreo);
        return view('correos.createCorreo')->with('correos', $correos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idcorreo)
    {
        $correos = Correo::find($idcorreo);
        $correos->correo = $request->get('correo');
        $correos->tipo_correo = $request->get('tipoCorreo');
        $correos->save();

        return redirect("/correos/" . $correos->persona_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idcorreo)
    {
        $correos = Correo::find($idcorreo);
        $correos->delete();

        return redirect("/correos/" . $correos->persona_id);
    }
}
