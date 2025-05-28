<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de Cursos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 rounded-md shadow">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex items-center justify-between">
                    <a href="{{ route('cursos.create') }}"
                       class="inline-block px-4 py-2 mb-6 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Cadastrar Novo Curso
                    </a>
                </div>

                @if ($cursos->isEmpty())
                    <p class="text-gray-600 dark:text-gray-300">Nenhum curso cadastrado.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Nome</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Sigla</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Total de Horas</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Nível</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Eixo</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Vizualizar</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Editar</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Remover</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                            @foreach ($cursos as $curso)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $curso->nome }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $curso->sigla }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $curso->total_horas }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $curso->nivel->nome ?? 'Não informado' }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $curso->eixo->nome ?? 'Não informado' }}</td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('cursos.show', $curso) }}"
                                           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                            Ver
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('cursos.edit', $curso) }}"
                                           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                            Editar
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 space-x-2">
                                    <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition text-xs">
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

                <a href="{{ route('dashboard') }}"
                   class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition mt-6">
                    Voltar à Página Inicial
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
