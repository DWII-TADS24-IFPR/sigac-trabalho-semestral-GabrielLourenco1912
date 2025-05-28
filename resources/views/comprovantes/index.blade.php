@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comprovantes</h1>

        <a href="{{ route('comprovantes.create') }}" class="btn btn-primary mb-3">Novo Comprovante</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($comprovantes->isEmpty())
            <p>Nenhum comprovante cadastrado.</p>
        @else

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Horas</th>
                    <th>Atividade</th>
                    <th>Categoria</th>
                    <th>Aluno</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comprovantes as $comprovante)
                    <tr>
                        <td>{{ $comprovante->id }}</td>
                        <td>{{ $comprovante->horas }}</td>
                        <td>{{ $comprovante->atividade }}</td>
                        <td>{{ $comprovante->categoria->nome ?? '-' }}</td>
                        <td>{{ $comprovante->aluno->nome ?? '-' }}</td>
                        <td>
                            <a href="{{ route('comprovantes.show', $comprovante) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('comprovantes.edit', $comprovante) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('comprovantes.destroy', $comprovante) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Voltar a Página Inicial</a>
    </div>
@endsection
