@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Comprovante</h1>

        <p><strong>ID:</strong> {{ $comprovante->id }}</p>
        <p><strong>Horas:</strong> {{ $comprovante->horas }}</p>
        <p><strong>Atividade:</strong> {{ $comprovante->atividade }}</p>
        <p><strong>Categoria:</strong> {{ $comprovante->categoria->nome ?? '-' }}</p>
        <p><strong>Aluno:</strong> {{ $comprovante->aluno->nome ?? '-' }}</p>

        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
