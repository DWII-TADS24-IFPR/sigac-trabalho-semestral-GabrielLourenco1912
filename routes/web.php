<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\EixoController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'checkrole:3.2'])->group(function () {

// Comprovantes

    Route::get('/comprovantes', [ComprovanteController::class, 'index'])->name('comprovantes.index');

    Route::get('/comprovantes/create', [ComprovanteController::class, 'create'])->name('comprovantes.create');

    Route::get('/comprovantes/{comprovante}/show', [ComprovanteController::class, 'show'])->name('comprovantes.show');

    Route::get('/comprovantes/{comprovante}/edit', [ComprovanteController::class, 'edit'])->name('comprovantes.edit');

    Route::post('/comprovantes', [ComprovanteController::class, 'store'])->name('comprovantes.store');

    Route::put('/comprovantes/{comprovante}', [ComprovanteController::class, 'update'])->name('comprovantes.update');

    Route::delete('/comprovantes/{comprovante}', [ComprovanteController::class, 'destroy'])->name('comprovantes.destroy');
});

Route::middleware(['auth', 'checkrole:2'])->group(function () {

// Pessoa

    Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');

    Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');

    Route::get('/alunos/{aluno}/show', [AlunoController::class, 'show'])->name('alunos.show');

    Route::get('/alunos/{aluno}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');

    Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');

    Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');

    Route::delete('/alunos/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');

// Categoria

    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');

    Route::get('/categorias/{categoria}/show', [CategoriaController::class, 'show'])->name('categorias.show');

    Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');

    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');

    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');

    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

// Cursos

    Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');

    Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');

    Route::get('/cursos/{curso}/show', [CursoController::class, 'show'])->name('cursos.show');

    Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');

    Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');

    Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');

    Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

//Declaração

    Route::get('/declaracaos', [DeclaracaoController::class, 'index'])->name('declaracaos.index');

    Route::get('/declaracaos/create', [DeclaracaoController::class, 'create'])->name('declaracaos.create');

    Route::get('/declaracaos/{declaracao}/show', [DeclaracaoController::class, 'show'])->name('declaracaos.show');

    Route::get('/declaracaos/{declaracao}/edit', [DeclaracaoController::class, 'edit'])->name('declaracaos.edit');

    Route::post('/declaracaos', [DeclaracaoController::class, 'store'])->name('declaracaos.store');

    Route::put('/declaracaos/{declaracao}', [DeclaracaoController::class, 'update'])->name('declaracaos.update');

    Route::delete('/declaracaos/{declaracao}', [DeclaracaoController::class, 'destroy'])->name('declaracaos.destroy');

// Documentos

    Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos.index');

    Route::get('/documentos/create', [DocumentoController::class, 'create'])->name('documentos.create');

    Route::get('/documentos/{documento}/show', [DocumentoController::class, 'show'])->name('documentos.show');

    Route::get('/documentos/{documento}/edit', [DocumentoController::class, 'edit'])->name('documentos.edit');

    Route::post('/documentos', [DocumentoController::class, 'store'])->name('documentos.store');

    Route::put('/documentos/{documento}', [DocumentoController::class, 'update'])->name('documentos.update');

    Route::delete('/documentos/{documento}', [DocumentoController::class, 'destroy'])->name('documentos.destroy');

// Nivel

    Route::get('/nivels', [NivelController::class, 'index'])->name('nivels.index');

    Route::get('/nivels/create', [NivelController::class, 'create'])->name('nivels.create');

    Route::get('/nivels/{nivel}/show', [NivelController::class, 'show'])->name('nivels.show');

    Route::get('/nivels/{nivel}/edit', [NivelController::class, 'edit'])->name('nivels.edit');

    Route::post('/nivels', [NivelController::class, 'store'])->name('nivels.store');

    Route::put('/nivels/{nivel}', [NivelController::class, 'update'])->name('nivels.update');

    Route::delete('/nivels/{nivel}', [NivelController::class, 'destroy'])->name('nivels.destroy');

// Turma

    Route::get('/turmas', [TurmaController::class, 'index'])->name('turmas.index');

    Route::get('/turmas/create', [TurmaController::class, 'create'])->name('turmas.create');

    Route::get('/turmas/{turma}/show', [TurmaController::class, 'show'])->name('turmas.show');

    Route::get('/turmas/{turma}/edit', [TurmaController::class, 'edit'])->name('turmas.edit');

    Route::post('/turmas', [TurmaController::class, 'store'])->name('turmas.store');

    Route::put('/turmas/{turma}', [TurmaController::class, 'update'])->name('turmas.update');

    Route::delete('/turmas/{turma}', [TurmaController::class, 'destroy'])->name('turmas.destroy');

//Eixos

    Route::get('/eixos', [EixoController::class, 'index'])->name('eixos.index');

    Route::get('/eixos/create', [EixoController::class, 'create'])->name('eixos.create');

    Route::get('/eixos/{eixo}/show', [EixoController::class, 'show'])->name('eixos.show');

    Route::get('/eixos/{eixo}/edit', [EixoController::class, 'edit'])->name('eixos.edit');

    Route::post('/eixos', [EixoController::class, 'store'])->name('eixos.store');

    Route::put('/eixos/{eixo}', [EixoController::class, 'update'])->name('eixos.update');

    Route::delete('/eixos/{eixo}', [EixoController::class, 'destroy'])->name('eixos.destroy');

});

require __DIR__.'/auth.php';
