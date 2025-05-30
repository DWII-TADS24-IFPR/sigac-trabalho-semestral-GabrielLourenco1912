<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Declaração
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-6 px-4 py-3 bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300 rounded-md shadow">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('declaracaos.update', $declaracao->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="data" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Data</label>
                        <input type="date" name="data" id="data" value="{{ old('data', $declaracao->data) }}" required
                               class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="aluno_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Aluno</label>
                        <select name="aluno_id" id="aluno_id" required
                                class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($alunos as $aluno)
                                @if($aluno->user_id == auth()->id() || auth()->user()->role_id == 2)
                                    <option value="{{ $aluno->id }}" {{ $declaracao->aluno_id == $aluno->id ? 'selected' : '' }}>
                                        {{ $aluno->nome }}
                                    </option>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="comprovante_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Comprovante</label>
                        <select name="comprovante_id" id="comprovante_id"
                                class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($comprovantes as $comprovante)
                                @if($comprovante->user_id == auth()->id() || auth()->user()->role_id == 2)
                                    <option value="{{ $comprovante->id }}" {{ $declaracao->comprovante_id == $comprovante->id ? 'selected' : '' }}>
                                        {{ $comprovante->hash }}
                                    </option>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="flex gap-6">
                        <button type="submit"
                                class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                            Salvar
                        </button>

                        <a href="{{ route('declaracaos.index') }}"
                           class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
