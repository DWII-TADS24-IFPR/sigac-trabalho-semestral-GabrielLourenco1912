<?php

namespace App\Http\Controllers;

use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Comprovante;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $declaracoes = Declaracao::with(['aluno', 'comprovante'])->get();
        return view('declaracaos.index', compact('declaracoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alunos = Aluno::all();
        $comprovantes = Comprovante::all();
        return view('declaracaos.create', compact('alunos', 'comprovantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'hash' => 'required|string|max:255|unique:declaracaos,hash',
            'data' => 'required|date',
            'aluno_id' => 'required|exists:alunos,id',
            'comprovante_id' => 'required|exists:comprovantes,id',
        ]);

        Declaracao::create($data);

        return redirect()->route('declaracaos.index')->with('success', 'Declaração criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Declaracao $declaracao)
    {
        return view('declaracaos.show', compact('declaracao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Declaracao $declaracao)
    {
        $alunos = Aluno::all();
        $comprovantes = Comprovante::all();
        return view('declaracaos.edit', compact('declaracao', 'alunos', 'comprovantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Declaracao $declaracao)
    {
        $data = $request->validate([
            'hash' => 'required|string|max:255|unique:declaracaos,hash,' . $declaracao->id,
            'data' => 'required|date',
            'aluno_id' => 'required|exists:alunos,id',
            'comprovante_id' => 'required|exists:comprovantes,id',
        ]);

        $declaracao->update($data);

        return redirect()->route('declaracaos.index')->with('success', 'Declaração atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Declaracao $declaracao)
    {
        $declaracao->delete();

        return redirect()->route('declaracaos.index')->with('success', 'Declaração removida com sucesso!');
    }
}
