<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes da Turma
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="space-y-4 text-gray-800 dark:text-gray-100">
                    <p><strong>ID:</strong> {{ $turma->id }}</p>
                    <p><strong>Curso:</strong> {{ $turma->curso->nome ?? 'Não encontrado' }}</p>
                    <p><strong>Ano:</strong> {{ $turma->ano }}</p>
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('turmas.edit', $turma) }}"
                       class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition mt-4">
                        Editar
                    </a>

                    <a href="{{ route('turmas.index') }}"
                       class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition mt-4">
                        Voltar
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
