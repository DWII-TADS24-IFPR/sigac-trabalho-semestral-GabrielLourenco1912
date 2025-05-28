<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de Níveis
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('nivels.create') }}"
                   class="inline-block px-4 py-2 mb-6 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Cadastrar Novo Nível
                </a>

                @if ($nivels->isEmpty())
                    <p class="text-gray-800 dark:text-gray-300">Nenhum nível cadastrado.</p>
                @else
                    <div class="overflow-x-auto mb-6">
                        <table class="min-w-full bg-white dark:bg-gray-700 rounded shadow">
                            <thead>
                            <tr class="bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-100">
                                <th class="px-4 py-2 text-left">Nome</th>
                                <th class="px-4 py-2 text-center">Visualizar</th>
                                <th class="px-4 py-2 text-center">Editar</th>
                                <th class="px-4 py-2 text-center">Remover</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($nivels as $nivel)
                                <tr class="border-b border-gray-200 dark:border-gray-600">
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $nivel->nome }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('nivels.show', $nivel) }}"
                                           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                            Ver
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('nivels.edit', $nivel) }}"
                                           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                            Editar
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <form action="{{ route('nivels.destroy', $nivel->id) }}" method="POST"
                                              onsubmit="return confirm('Tem certeza que deseja remover este nível?');">
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

                <a href="{{ route('dashboard') }}"
                   class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                    Voltar à Página Inicial
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

