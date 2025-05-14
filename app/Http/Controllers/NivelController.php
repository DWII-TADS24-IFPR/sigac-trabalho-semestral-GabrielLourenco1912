<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nivels = Nivel::all();
        return view('nivels.index', compact('nivels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nivels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255|unique:nivels,nome',
        ]);

        Nivel::create($data);

        return redirect()->route('nivels.index')->with('success', 'Nível criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $nivel)
    {
        return view('nivels.show', compact('nivel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nivel $nivel)
    {
        return view('nivels.edit', compact('nivel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nivel $nivel)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255|unique:nivels,nome,' . $nivel->id,
        ]);

        $nivel->update($data);

        return redirect()->route('nivels.index')->with('success', 'Nível atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nivel $nivel)
    {
        $nivel->delete();

        return redirect()->route('nivels.index')->with('success', 'Nível removido com sucesso!');
    }
}
