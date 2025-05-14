<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        $turmas = Turma::all();

        return view('alunos.create', compact('cursos', 'turmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email',
            'idade' => 'required|integer|min:1',
            'senha' => 'required|string|min:6|confirmed',
            'senha_confirmation' => 'required|string|min:6|confirmed',
            'curso' => 'required|string|max:255',
            'turma' => 'required|string|max:255',
        ]);

        if ($request->senha !== $request->senha_confirmation) {
            return back()->withErrors(['password' => 'As senhas não coincidem.']);
        }

        $curso = Curso::where('nome', $request->curso)->first();

        if (!$curso) {
            return back()->withErrors(['curso' => 'Curso não encontrado']);
        }

        $turma = Turma::where('nome', $request->turma)->first();

        if (!$turma) {
            return back()->withErrors(['turma' => 'Curso não encontrado']);
        }

        $data['user_id'] = 1;
        $data['curso'] = $curso->id;
        $data['turma'] = $turma->id;
        $data['senha'] = Hash::make($data['senha']);

        $aluno = Aluno::create($data);

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        $cursos = Curso::all();
        $turmas = Turma::all();

        return view('alunos.edit', compact('cursos', 'turmas',  'aluno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'idade' => 'required|integer|min:1',
            'senha' => 'nullable|string|min:6|confirmed',
            'curso' => 'required|string|max:255',
            'turma' => 'required|string|max:255',
        ]);

        if ($request->senha !== $request->senha_confirmation) {
            return back()->withErrors(['password' => 'As senhas não coincidem.']);
        }

        $curso = Curso::where('nome', $request->curso)->first();

        if (!$curso) {
            return back()->withErrors(['curso' => 'Curso não encontrado']);
        }

        $turma = Turma::where('nome', $request->turma)->first();

        if (!$turma) {
            return back()->withErrors(['turma' => 'Curso não encontrado']);
        }

        $data['user_id'] = 1;
        $data['curso'] = $curso->id;
        $data['turma'] = $turma->id;

        if (!empty($data['senha'])) {
            $data['senha'] = Hash::make($data['senha']);
        } else {
            unset($data['senha']);
        }

        $aluno->update($data);

        return redirect()->route('alunos.index')->with('success', 'Aluno editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno removido com sucesso!');
    }
}
