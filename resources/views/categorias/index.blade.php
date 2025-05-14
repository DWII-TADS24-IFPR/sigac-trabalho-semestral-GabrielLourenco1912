@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Categorias</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Cadastrar Nova Categoria</a>

        @if ($categorias->isEmpty())
            <p>Nenhuma categoria cadastrada.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Máximo de Horas<</th>
                    <th>Curso</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nome }}</td>
                        <td>{{ $categoria->email }}</td>
                        <td>{{ $categoria->idade }}</td>
                        <td>{{ $categoria->curso->nome }}</td>
                        <td><a href="{{ route('categorias.show', $categoria) }}" class="btn btn-info">Ver</a></td>
                        <td><a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning">Editar</a></td>
                        <td>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover esta categoria?');">
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
    </div>
@endsection
