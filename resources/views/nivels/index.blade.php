@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Níveis</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('nivels.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Nível</a>

        @if ($nivels->isEmpty())
            <p>Nenhum nível cadastrado.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($nivels as $nivel)
                    <tr>
                        <td>{{ $nivel->nome }}</td>
                        <td><a href="{{ route('nivels.show', $nivel) }}" class="btn btn-info">Ver</a></td>
                        <td><a href="{{ route('nivels.edit', $nivel) }}" class="btn btn-warning">Editar</a></td>
                        <td>
                            <form action="{{ route('nivels.destroy', $nivel->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este nível?');">
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
