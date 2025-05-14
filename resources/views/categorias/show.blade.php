@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Categoria</h1>

        <div class="mb-3">
            <strong>Nome:</strong> {{ $categoria->nome }}
        </div>

        <div class="mb-3">
            <strong>Descrição:</strong> {{ $categoria->descricao }}
        </div>

        <div class="mb-3">
            <strong>Máximo de Horas:</strong> {{ $categoria->maximo_horas }}
        </div>

        <div class="mb-3">
            <strong>Curso:</strong> {{ $categoria->curso->nome ?? 'Não informado' }}
        </div>

        <a href="{{ route('categorias.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection
