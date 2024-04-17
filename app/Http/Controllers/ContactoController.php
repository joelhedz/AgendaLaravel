<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Persona;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $idcontacto)
    {
        return view('contactos.createContactos')->with('idcontacto', $idcontacto);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contactos = new Contacto();
        $contactos->persona_id = $request->get('codPersona');
        $contactos->telefono = $request->get('telefono');
        $contactos->tipo_telefono = $request->get('tipoTelefono');
        $contactos->save();

        return redirect("/contactos/" . $contactos->persona_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idcontacto)
    {
        $contactoNombre = Persona::find($idcontacto);
        $contactos = Contacto::where('persona_id', $idcontacto)->get();
        return view('contactos.index')->with('contactos', $contactos)->with('contactoNombre', $contactoNombre);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idcontacto)
    {
        $contactos = Contacto::find($idcontacto);
        return view('contactos.createContactos')->with('contactos', $contactos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idcontacto)
    {
        $contactos = Contacto::find($idcontacto);
        $contactos->telefono = $request->get('telefono');
        $contactos->tipo_telefono = $request->get('tipoTelefono');

        $contactos->save();

        return redirect('/contactos/' . $contactos->persona_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idcontacto)
    {
        $contactos = Contacto::find($idcontacto);
        $idPersona = $contactos->persona_id;
        $contactos->delete();

        return redirect('/contactos' . $idPersona);
    }
}
