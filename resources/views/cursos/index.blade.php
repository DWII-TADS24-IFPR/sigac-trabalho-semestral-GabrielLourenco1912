@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Cursos</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Curso</a>

        @if ($cursos->isEmpty())
            <p>Nenhum curso cadastrado.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sigla</th>
                    <th>Total de Horas</th>
                    <th>Nível</th>
                    <th>Eixo</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->nome }}</td>
                        <td>{{ $curso->sigla }}</td>
                        <td>{{ $curso->total_horas }}</td>
                        <td>{{ $curso->nivel->nome ?? 'Não informado' }}</td>
                        <td>{{ $curso->eixo->nome ?? 'Não informado' }}</td>
                        <td>
                            <a href="{{ route('cursos.show', $curso) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este curso?');">
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
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Voltar a Página Inicial</a>
    </div>
@endsection
