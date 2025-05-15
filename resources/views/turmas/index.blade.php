@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Turmas</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('turmas.create') }}" class="btn btn-primary mb-3">Cadastrar Nova Turma</a>

        @if ($turmas->isEmpty())
            <p>Nenhuma turma cadastrada.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Curso</th>
                    <th>Ano</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($turmas as $turma)
                    <tr>
                        <td>{{ $turma->curso->nome }}</td>
                        <td>{{ $turma->ano }}</td>
                        <td><a href="{{ route('turmas.show', $turma) }}" class="btn btn-info">Ver</a></td>
                        <td><a href="{{ route('turmas.edit', $turma) }}" class="btn btn-warning">Editar</a></td>
                        <td>
                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover esta turma?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover</button>
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
