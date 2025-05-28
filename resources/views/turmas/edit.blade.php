<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Turma
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('turmas.update', $turma) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="curso_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Curso
                        </label>
                        <select name="curso_id" id="curso_id"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            @foreach($cursos as $curso)
                                <option value="{{ $curso->id }}" {{ $turma->curso_id == $curso->id ? 'selected' : '' }}>
                                    {{ $curso->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('curso_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="ano" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Ano
                        </label>
                        <input type="number" name="ano" id="ano"
                               value="{{ old('ano', $turma->ano) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        @error('ano')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-6">
                        <button type="submit"
                                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Atualizar
                        </button>
                        <a href="{{ route('turmas.index') }}"
                           class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
