@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Curso</h1>

        <div class="mb-3">
            <strong>Nome:</strong> {{ $curso->nome }}
        </div>

        <div class="mb-3">
            <strong>Sigla:</strong> {{ $curso->sigla }}
        </div>

        <div class="mb-3">
            <strong>Total de Horas:</strong> {{ $curso->total_horas }}
        </div>

        <div class="mb-3">
            <strong>Nível:</strong> {{ $curso->nivel->nome ?? 'Não informado' }}
        </div>

        <div class="mb-3">
            <strong>Eixo:</strong> {{ $curso->eixo->nome ?? 'Não informado' }}
        </div>

        <a href="{{ route('cursos.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection
