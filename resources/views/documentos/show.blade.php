@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Documento</h1>

        <div class="mb-3">
            <strong>Usuário:</strong> {{ $documento->user->name ?? 'N/A' }}
        </div>

        <div class="mb-3">
            <strong>Categoria:</strong> {{ $documento->categoria->nome ?? 'N/A' }}
        </div>

        <div class="mb-3">
            <strong>Status:</strong> {{ ucfirst($documento->status) }}
        </div>

        <div class="mb-3">
            <strong>Horas:</strong> {{ $documento->horas_in }}
        </div>

        <div class="mb-3">
            <strong>Comentário:</strong> {{ $documento->comentario }}
        </div>

        <div class="mb-3">
            <strong>Arquivo:</strong>
            @if ($documento->url)
                <a href="{{ asset('storage/' . $documento->url) }}" target="_blank">Visualizar Documento</a>
            @else
                Nenhum arquivo enviado.
            @endif
        </div>

        <a href="{{ route('documentos.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection
