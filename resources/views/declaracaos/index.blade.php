@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Declarações</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('declaracaos.create') }}" class="btn btn-primary mb-3">Nova Declaração</a>

        @if ($declaracoes->isEmpty())
            <p>Nenhuma declaração cadastrada.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Hash</th>
                    <th>Data</th>
                    <th>Aluno</th>
                    <th>Comprovante</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($declaracoes as $declaracao)
                    <tr>
                        <td>{{ $declaracao->hash }}</td>
                        <td>{{ $declaracao->data }}</td>
                        <td>{{ $declaracao->aluno->nome ?? 'N/A' }}</td>
                        <td>{{ $declaracao->comprovante->nome ?? 'N/A' }}</td>
                        <td><a href="{{ route('declaracaos.show', $declaracao) }}" class="btn btn-info">Ver</a></td>
                        <td><a href="{{ route('declaracaos.edit', $declaracao) }}" class="btn btn-warning">Editar</a></td>
                        <td>
                            <form action="{{ route('declaracaos.destroy', $declaracao) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ route('index') }}" class="btn btn-secondary">Voltar a Página Inicial</a>
    </div>
@endsection
