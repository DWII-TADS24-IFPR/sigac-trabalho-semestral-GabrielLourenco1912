<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Documento
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-6 px-4 py-3 rounded-md bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                    <strong>Erro!</strong> Verifique os campos abaixo:
                    <ul class="list-disc pl-5 mt-2">
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('documentos.update', $documento->id) }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="horas_in" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas</label>
                    <input type="number" name="horas_in" id="horas_in" required
                           value="{{ old('horas_in', $documento->horas_in) }}"
                           class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoria</label>
                    <select name="categoria_id" id="categoria_id" required
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $documento->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="comentario" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Comentário</label>
                    <textarea name="comentario" id="comentario" rows="3"
                              class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">{{ old('comentario', $documento->comentario) }}</textarea>
                </div>

                <div class="flex gap-6">
                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Salvar
                    </button>
                    <a href="{{ route('documentos.index') }}"
                       class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

