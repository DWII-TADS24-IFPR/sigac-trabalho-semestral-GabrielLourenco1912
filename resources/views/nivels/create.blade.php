@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Nível</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro!</strong> Verifique os campos abaixo:<br><br>
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('nivels.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Nível</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('nivels.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
