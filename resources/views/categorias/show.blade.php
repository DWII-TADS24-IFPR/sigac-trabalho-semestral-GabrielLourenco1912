<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes da Categoria
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 space-y-6">

                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Informações da Categoria</h2>

                    <div class="mb-3 text-gray-700 dark:text-gray-300">
                        <strong>Nome:</strong> {{ $categoria->nome }}
                    </div>

                    <div class="mb-3 text-gray-700 dark:text-gray-300">
                        <strong>Descrição:</strong> {{ $categoria->descricao }}
                    </div>

                    <div class="mb-3 text-gray-700 dark:text-gray-300">
                        <strong>Máximo de Horas:</strong> {{ $categoria->maximo_horas }}
                    </div>

                    <div class="mb-6 text-gray-700 dark:text-gray-300">
                        <strong>Curso:</strong> {{ $categoria->curso->nome ?? 'Não informado' }}
                    </div>
                </div>

                <div class="flex gap-6">
                    <a href="{{ route('categorias.index') }}"
                       class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Voltar
                    </a>

                    <a href="{{ route('categorias.edit', $categoria->id) }}"
                       class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Editar
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

