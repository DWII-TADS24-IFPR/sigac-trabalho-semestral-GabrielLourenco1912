@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Aluno</h1>

        <div class="mb-3">
            <strong>Nome:</strong> {{ $aluno->nome }}
        </div>

        <div class="mb-3">
            <strong>Email:</strong> {{ $aluno->email }}
        </div>

        <div class="mb-3">
            <strong>CPF:</strong> {{ $aluno->cpf }}
        </div>

        <div class="mb-3">
            <strong>Curso:</strong> {{ $aluno->curso->nome ?? 'Não informado' }}
        </div>

        <div class="mb-3">
            <strong>Turma:</strong> {{ $aluno->turma?->curso?->sigla }} {{ $aluno->turma?->ano ?? 'Não informado' }}
        </div>

        <a href="{{ route('alunos.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection
