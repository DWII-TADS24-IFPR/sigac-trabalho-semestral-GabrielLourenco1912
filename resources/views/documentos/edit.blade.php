@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Documento</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('documentos.update', $documento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="horas_in" class="form-label">Horas</label>
                <input type="number" name="horas_in" id="horas_in" class="form-control" value="{{ old('horas_in', $documento->horas_in) }}" required>
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="form-select" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $documento->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="comentario" class="form-label">Comentário</label>
                <textarea name="comentario" id="comentario" class="form-control" rows="3">{{ old('comentario', $documento->comentario) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
