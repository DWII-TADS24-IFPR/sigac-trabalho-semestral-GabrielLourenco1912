<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Categoria;
use App\Models\Aluno;
use App\Models\Documento;
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
        $documentos = Documento::all();

        return view('comprovantes.create', compact('categorias', 'alunos', 'documentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'hash' => 'required|string|max:255|unique:comprovantes,hash',
            'horas' => 'required|integer|min:1',
            'atividade' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id',
            'documento_id' => 'required|exists:documentos,id',
        ]);

        $documento = Documento::find($data['documento_id']);

        $documento->status = 'Aprovado';
        $documento->save();

        $data['user_id'] = auth()->id();

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
        $documentos = Documento::all();
        return view('comprovantes.edit', compact('comprovante', 'categorias', 'alunos',  'documentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comprovante $comprovante)
    {
        $data = $request->validate([
            'hash' => 'required|string|max:255|unique:comprovantes,hash,' . $comprovante->id,
            'horas' => 'required|integer|min:1',
            'atividade' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id',
            'documento_id' => 'required|exists:documentos,id',
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
