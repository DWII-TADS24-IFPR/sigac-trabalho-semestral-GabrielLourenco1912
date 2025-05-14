@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Documentos</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('documentos.create') }}" class="btn btn-primary mb-3">Enviar Novo Documento</a>

        @if ($documentos->isEmpty())
            <p>Nenhum documento enviado.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Categoria</th>
                    <th>Status</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($documentos as $documento)
                    <tr>
                        <td>{{ $documento->user->name ?? 'N/A' }}</td>
                        <td>{{ $documento->categoria->nome ?? 'Sem categoria' }}</td>
                        <td>{{ ucfirst($documento->status) }}</td>
                        <td><a href="{{ route('documentos.show', $documento) }}" class="btn btn-info">Ver</a></td>
                        <td><a href="{{ route('documentos.edit', $documento) }}" class="btn btn-warning">Editar</a></td>
                        <td>
                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" onsubmit="return confirm('Deseja remover este documento?');">
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
