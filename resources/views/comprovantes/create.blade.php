@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Comprovante</h1>

        <form action="{{ route('comprovantes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="horas" class="form-label">Horas</label>
                <input type="number" name="horas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="atividade" class="form-label">Atividade</label>
                <input type="text" name="atividade" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoria</label>
                <select name="categoria_id" class="form-select" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="aluno_id" class="form-label">Aluno</label>
                <select name="aluno_id" class="form-select" required>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
