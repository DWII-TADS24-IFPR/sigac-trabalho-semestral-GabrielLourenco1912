<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Categoria;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprovanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comprovantes = Comprovante::with(['categoria', 'aluno', 'user'])->get();
        return view('comprovantes.index', compact('comprovantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        return view('comprovantes.create', compact('categorias', 'alunos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'horas' => 'required|integer|min:1',
            'atividade' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id',
        ]);

        $data['user_id'] = 1;

        Comprovante::create($data);

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comprovante $comprovante)
    {
        return view('comprovantes.show', compact('comprovante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comprovante $comprovante)
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        return view('comprovantes.edit', compact('comprovante', 'categorias', 'alunos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comprovante $comprovante)
    {
        $data = $request->validate([
            'horas' => 'required|integer|min:1',
            'atividade' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id',
        ]);

        $comprovante->update($data);

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comprovante $comprovante)
    {
        $comprovante->delete();

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante removido com sucesso!');
    }
}
