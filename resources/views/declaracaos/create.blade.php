@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Declaração</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('declaracaos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="hash" class="form-label">Hash</label>
                <input type="text" name="hash" id="hash" class="form-control" value="{{ old('hash') }}" required>
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" name="data" id="data" class="form-control" value="{{ old('data') }}" required>
            </div>

            <div class="mb-3">
                <label for="aluno_id" class="form-label">Aluno</label>
                <select name="aluno_id" id="aluno_id" class="form-select" required>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="comprovante_id" class="form-label">Comprovante</label>
                <select name="comprovante_id" id="comprovante_id" class="form-select">
                    @foreach ($comprovantes as $comprovante)
                        <option value="{{ $comprovante->id }}">{{ $comprovante->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('declaracaos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
