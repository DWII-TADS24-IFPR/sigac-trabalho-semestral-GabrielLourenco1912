@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Página Inicial</h2>
            </div>
            <div class="card-body">
                <p class="lead">Acesse as seções do sistema:</p>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('alunos.index') }}">Alunos</a></li>
                    <li class="list-group-item"><a href="{{ route('categorias.index') }}">Categorias</a></li>
                    <li class="list-group-item"><a href="{{ route('comprovantes.index') }}">Comprovantes</a></li>
                    <li class="list-group-item"><a href="{{ route('cursos.index') }}">Cursos</a></li>
                    <li class="list-group-item"><a href="{{ route('declaracaos.index') }}">Declarações</a></li>
                    <li class="list-group-item"><a href="{{ route('documentos.index') }}">Documentos</a></li>
                    <li class="list-group-item"><a href="{{ route('nivels.index') }}">Níveis</a></li>
                    <li class="list-group-item"><a href="{{ route('turmas.index') }}">Turmas</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
