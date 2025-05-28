<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cadastrar Nível
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 rounded">
                        <strong class="block font-semibold mb-2">Erro!</strong>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('nivels.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nome do Nível
                        </label>
                        <input type="text" name="nome" id="nome"
                               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-500"
                               value="{{ old('nome') }}" required>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition mr-6">
                            Salvar
                        </button>
                        <a href="{{ route('nivels.index') }}"
                           class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

