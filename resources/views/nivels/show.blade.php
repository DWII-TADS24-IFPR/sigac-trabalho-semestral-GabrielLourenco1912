@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Nível</h1>

        <div class="mb-3">
            <strong>Nome:</strong> {{ $nivel->nome }}
        </div>

        <a href="{{ route('nivels.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('nivels.edit', $nivel->id) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection
