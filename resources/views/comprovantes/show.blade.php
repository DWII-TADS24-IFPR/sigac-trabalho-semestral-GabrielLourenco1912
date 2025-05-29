<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes do Comprovante
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 space-y-6">

                <div>
                    <div class="mb-3 text-gray-700 dark:text-gray-300">
                        <strong>ID:</strong> {{ $comprovante->id }}
                    </div>

                    <div class="mb-3 text-gray-700 dark:text-gray-300">
                        <strong>Horas:</strong> {{ $comprovante->horas }}
                    </div>

                    <div class="mb-3 text-gray-700 dark:text-gray-300">
                        <strong>Atividade:</strong> {{ $comprovante->atividade }}
                    </div>

                    <div class="mb-3 text-gray-700 dark:text-gray-300">
                        <strong>Categoria:</strong> {{ $comprovante->categoria->nome ?? '-' }}
                    </div>

                    <div class="mb-6 text-gray-700 dark:text-gray-300">
                        <strong>Aluno:</strong> {{ $comprovante->aluno->nome ?? '-' }}
                    </div>

                    <strong class="text-gray-700 dark:text-gray-300">Arquivo:</strong>
                    <span class="ml-2">
                        @if (\App\Models\Documento::find($comprovante->documento_id)->url)
                            <a href="{{ asset('storage/' . \App\Models\Documento::find($comprovante->documento_id)->url) }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-600 transition">
                                Visualizar Documento
                            </a>
                        @else
                            <span class="text-gray-500 dark:text-gray-400">Nenhum arquivo enviado.</span>
                        @endif
                    </span>
                </div>

                <div class="flex gap-6">
                    <a href="{{ route('comprovantes.index') }}"
                       class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Voltar
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
