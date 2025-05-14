@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Curso</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cursos.update', $curso) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $curso->nome) }}" required>
            </div>

            <div class="mb-3">
                <label for="sigla" class="form-label">Sigla</label>
                <input type="text" name="sigla" class="form-control" value="{{ old('sigla', $curso->sigla) }}" required>
            </div>

            <div class="mb-3">
                <label for="total_horas" class="form-label">Total de Horas</label>
                <input type="number" name="total_horas" class="form-control" value="{{ old('total_horas', $curso->total_horas) }}" required>
            </div>

            <div class="mb-3">
                <label for="nivel_id" class="form-label">Nível</label>
                <select name="nivel_id" class="form-select" required>
                    @foreach ($niveis as $nivel)
                        <option value="{{ $nivel->id }}" {{ $curso->nivel_id == $nivel->id ? 'selected' : '' }}>{{ $nivel->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="eixo_id" class="form-label">Eixo</label>
                <select name="eixo_id" class="form-select" required>
                    @foreach ($eixos as $eixo)
                        <option value="{{ $eixo->id }}" {{ $curso->eixo_id == $eixo->id ? 'selected' : '' }}>{{ $eixo->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
