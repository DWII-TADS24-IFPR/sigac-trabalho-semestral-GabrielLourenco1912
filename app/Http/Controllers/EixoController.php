<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eixos = Eixo::all();
        return view('eixos.index', compact('eixos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eixos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Eixo::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('eixos.index')->with('success', 'Eixo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Eixo $eixo)
    {
        return view('eixos.show', compact('eixo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eixo $eixo)
    {
        return view('eixos.edit', compact('eixo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eixo $eixo)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $eixo->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('eixos.index')->with('success', 'Eixo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eixo $eixo)
    {
        $eixo->delete();

        return redirect()->route('eixos.index')->with('success', 'Eixo deletado com sucesso!');
    }
}
