<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $users = User::all();

        return view('alunos.create', compact('cursos', 'turmas', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'cpf' => 'required|string|unique:alunos,cpf',
            'curso_id' => 'required|string|max:255',
            'turma_id' => 'required|string|max:255',
        ]);

        $user = User::find($data['user_id']);

        $user->role_id = 3;
        $user->save();

        $data['nome'] = $user->name;

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
            'cpf' => 'required|string|unique:alunos,cpf,' . $aluno->id,
            'curso_id' => 'required|string|max:255',
            'turma_id' => 'required|string|max:255',
        ]);

        $data['user_id'] = $aluno->user_id;

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
