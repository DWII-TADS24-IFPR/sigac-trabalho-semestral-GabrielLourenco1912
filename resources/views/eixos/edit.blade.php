<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Eixo
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

            @if ($errors->any())
                <div class="mb-4 rounded-md bg-red-50 p-4">
                    <ul class="list-disc list-inside text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('eixos.update', $eixo->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nome
                    </label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome', $eixo->nome) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500
                               dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                </div>

                <div class="flex gap-6">
                    <button type="submit"
                            class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Salvar
                    </button>
                    <a href="{{ route('eixos.index') }}"
                       class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
