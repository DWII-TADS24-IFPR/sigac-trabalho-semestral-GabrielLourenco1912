<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes do Documento
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-6">

                <div>
                    <strong class="text-gray-700 dark:text-gray-300">Usuário:</strong>
                    <span class="ml-2 text-gray-900 dark:text-gray-100">{{ $documento->user->name ?? 'N/A' }}</span>
                </div>

                <div>
                    <strong class="text-gray-700 dark:text-gray-300">Categoria:</strong>
                    <span class="ml-2 text-gray-900 dark:text-gray-100">{{ $documento->categoria->nome ?? 'N/A' }}</span>
                </div>

                <div>
                    <strong class="text-gray-700 dark:text-gray-300">Status:</strong>
                    <span class="ml-2 text-gray-900 dark:text-gray-100">{{ ucfirst($documento->status) }}</span>
                </div>

                <div>
                    <strong class="text-gray-700 dark:text-gray-300">Horas:</strong>
                    <span class="ml-2 text-gray-900 dark:text-gray-100">{{ $documento->horas_in }}</span>
                </div>

                <div class="flex items-center space-x-2">
                    <strong class="text-gray-700 dark:text-gray-300">Comentário:</strong>
                    <p class="text-gray-900 dark:text-gray-100 flex-1 ml-2">{{ $documento->comentario }}</p>
                </div>

                <div>
                    <strong class="text-gray-700 dark:text-gray-300">Arquivo:</strong>
                    <span class="ml-2">
                        @if ($documento->url)
                            <a href="{{ asset('storage/' . $documento->url) }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-600 transition">
                                Visualizar Documento
                            </a>
                        @else
                            <span class="text-gray-500 dark:text-gray-400">Nenhum arquivo enviado.</span>
                        @endif
                    </span>
                </div>

                <div class="flex gap-6">
                    <a href="{{ route('documentos.index') }}" class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Voltar
                    </a>
                    <a href="{{ route('documentos.edit', $documento->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Editar
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
