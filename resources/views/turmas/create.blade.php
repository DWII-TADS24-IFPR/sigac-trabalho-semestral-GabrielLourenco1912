@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Nova Turma</h1>

        <form action="{{ route('turmas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select name="curso_id" id="curso_id" class="form-control">
                    <option value="">Selecione um curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>{{ $curso->nome }}</option>
                    @endforeach
                </select>
                @error('curso_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano</label>
                <input type="number" name="ano" class="form-control" value="{{ old('ano') }}">
                @error('ano') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-success">Criar Turma</button>
        </form>
    </div>
@endsection
