<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Início
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">
                    <p class="text-lg font-medium">Você está logado!</p>

                    <div>
                        <p class="text-md font-semibold mb-4">Acesse as seções do sistema:</p>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <li>
                                <a href="{{ route('alunos.index') }}" class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                    Alunos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categorias.index') }}" class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                    Categorias
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('comprovantes.index') }}" class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                    Comprovantes
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cursos.index') }}" class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                    Cursos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('declaracaos.index') }}" class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                    Declarações
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('documentos.index') }}" class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                    Solicitações
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('nivels.index') }}" class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                    Níveis
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('turmas.index') }}" class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                    Turmas
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('eixos.index') }}" class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                    Eixos
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

