@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Declaração</h1>

        <div class="mb-3">
            <strong>Hash:</strong> {{ $declaracao->hash }}
        </div>

        <div class="mb-3">
            <strong>Data:</strong> {{ $declaracao->data }}
        </div>

        <div class="mb-3">
            <strong>Aluno:</strong> {{ $declaracao->aluno->nome ?? 'Não informado' }}
        </div>

        <div class="mb-3">
            <strong>Comprovante:</strong> {{ $declaracao->comprovante->nome ?? 'Não informado' }}
        </div>

        <a href="{{ route('declaracaos.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('declaracaos.edit', $declaracao->id) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection
