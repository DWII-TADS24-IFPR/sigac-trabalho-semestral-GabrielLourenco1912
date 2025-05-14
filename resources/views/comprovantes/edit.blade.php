@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Comprovante</h1>

        <form action="{{ route('comprovantes.update', $comprovante) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="horas" class="form-label">Horas</label>
                <input type="number" name="horas" class="form-control" value="{{ $comprovante->horas }}" required>
            </div>

            <div class="mb-3">
                <label for="atividade" class="form-label">Atividade</label>
                <input type="text" name="atividade" class="form-control" value="{{ $comprovante->atividade }}" required>
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoria</label>
                <select name="categoria_id" class="form-select" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $comprovante->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="aluno_id" class="form-label">Aluno</label>
                <select name="aluno_id" class="form-select" required>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}" {{ $comprovante->aluno_id == $aluno->id ? 'selected' : '' }}>
                            {{ $aluno->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
