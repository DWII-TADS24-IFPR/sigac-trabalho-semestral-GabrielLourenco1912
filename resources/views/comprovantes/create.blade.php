<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cadastrar Comprovante
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            @if ($errors->any())
                <div class="mb-4 rounded-md bg-red-50 p-4">
                    <ul class="list-disc list-inside text-sm text-red-700">
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('comprovantes.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="hash" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hash</label>
                    <input type="text" name="hash" id="hash" value="{{ old('hash') }}" required
                           class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                </div>

                <div>
                    <label for="horas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Horas
                    </label>
                    <input
                        type="number"
                        name="horas"
                        id="horas"
                        value="{{ old('horas') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                    >
                </div>

                <div>
                    <label for="atividade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Atividade
                    </label>
                    <input
                        type="text"
                        name="atividade"
                        id="atividade"
                        value="{{ old('atividade') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                    >
                </div>

                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Categoria
                    </label>
                    <select
                        name="categoria_id"
                        id="categoria_id"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="aluno_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Aluno
                    </label>
                    <select
                        name="aluno_id"
                        id="aluno_id"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        @foreach ($alunos as $aluno)
                            <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                                {{ $aluno->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="documento_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Solicitação
                    </label>
                    <select
                        name="documento_id"
                        id="documento_id"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        @foreach ($documentos as $documento)
                            @if ($documento->status != 'Aprovado')
                                <option value="{{ $documento->id }}" {{ old('$documento_id') == $documento->id ? 'selected' : '' }}>
                                    {{ $documento->comentario }}
                                </option>
                            @else
                                @continue
                            @endif
                        @endforeach
                    </select>

                </div>

                <div class="flex gap-6">
                    <button type="submit"
                            class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Salvar
                    </button>
                    <a href="{{ route('comprovantes.index') }}"
                       class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
