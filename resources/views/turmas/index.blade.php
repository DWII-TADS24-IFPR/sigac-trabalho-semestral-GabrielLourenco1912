<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de Turmas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('turmas.create') }}"
                   class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition mb-6">
                    Cadastrar Nova Turma
                </a>

                @if ($turmas->isEmpty())
                    <p class="text-gray-700 dark:text-gray-300">Nenhuma turma cadastrada.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-700 rounded shadow">
                            <thead>
                            <tr class="bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-100">
                                <th class="px-4 py-2 text-left">Curso</th>
                                <th class="px-4 py-2 text-left">Ano</th>
                                <th class="px-4 py-2">Visualizar</th>
                                <th class="px-4 py-2">Editar</th>
                                <th class="px-4 py-2">Remover</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($turmas as $turma)
                                <tr class="border-b border-gray-200 dark:border-gray-600">
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $turma->curso->nome }}</td>
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $turma->ano }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('turmas.show', $turma) }}"
                                           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                            Ver
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('turmas.edit', $turma) }}"
                                           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                            Editar
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <form action="{{ route('turmas.destroy', $turma->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Tem certeza que deseja remover esta turma?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-block px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                                Remover
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="mt-6">
                    <a href="{{ route('dashboard') }}"
                       class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Voltar à Página Inicial
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
