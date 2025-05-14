@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Turma</h1>

        <form action="{{ route('turmas.update', $turma) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select name="curso_id" id="curso_id" class="form-control">
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ $turma->curso_id == $curso->id ? 'selected' : '' }}>{{ $curso->nome }}</option>
                    @endforeach
                </select>
                @error('curso_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano</label>
                <input type="number" name="ano" class="form-control" value="{{ old('ano', $turma->ano) }}">
                @error('ano') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
