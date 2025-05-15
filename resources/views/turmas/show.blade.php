@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Turma</h1>

        <p><strong>ID:</strong> {{ $turma->id }}</p>
        <p><strong>Curso:</strong> {{ $turma->curso->nome ?? 'Não encontrado' }}</p>
        <p><strong>Ano:</strong> {{ $turma->ano }}</p>

        <a href="{{ route('turmas.edit', $turma) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
