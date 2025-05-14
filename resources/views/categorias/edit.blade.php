@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoria</h1>

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

        <form action="{{ route('categorias.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao') }}" required>
            </div>

            <div class="mb-3">
                <label for="maximo_horas" class="form-label">Máximo de Horas</label>
                <input type="number" name="maximo_horas" id="maximo_horas" class="form-control" value="{{ old('maximo_horas') }}" required>
            </div>

            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select name="curso" id="curso" class="form-select" required>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ $aluno->curso_id == $curso->id ? 'selected' : '' }}>{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('catogorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
