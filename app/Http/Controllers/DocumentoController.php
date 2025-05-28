<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentos = Documento::with(['categoria', 'user'])->get();
        return view('documentos.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('documentos.create', compact('categorias', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'horas_in' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'comentario' => 'nullable|string|max:1000',
        ]);

        $path = $request->file('url')->store('documentos', 'public');

        Documento::create([
            'url' => $path,
            'horas_in' => $request->horas_in,
            'categoria_id' => $request->categoria_id,
            'comentario' => $request->comentario,
            'status' => 'pendente', // ou outro valor padrão
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('documentos.index')->with('success', 'Documento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Documento $documento)
    {
        return view('documentos.show', compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documento $documento)
    {
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('documentos.edit', compact('documento', 'categorias', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documento $documento)
    {
        $data = $request->validate([
            'url' => 'required|url|max:255',
            'horas_in' => 'required|integer|min:0',
            'status' => 'required|string|max:255',
            'comentario' => 'nullable|string|max:1000',
            'categoria_id' => 'required|exists:categorias,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $documento->update($data);

        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
    {
        $documento->delete();

        return redirect()->route('documentos.index')->with('success', 'Documento removido com sucesso!');
    }
}
