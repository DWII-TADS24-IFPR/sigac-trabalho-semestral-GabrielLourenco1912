@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Enviar Documento</h1>

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

        <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="url" class="form-label">Arquivo</label>
                <input type="file" name="url" id="url" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="horas_in" class="form-label">Horas</label>
                <input type="number" name="horas_in" id="horas_in" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="form-select" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="comentario" class="form-label">Comentário</label>
                <textarea name="comentario" id="comentario" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Enviar</button>
            <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
