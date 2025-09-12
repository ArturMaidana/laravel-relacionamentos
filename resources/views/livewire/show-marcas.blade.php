 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marcas') }}
        </h2>
    </x-slot>

<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto py-8 px-4">

        <!-- Header with Search Bar -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">
                @if($marcaId)
                    Editar
                @else
                    Cadastrar
                @endif
            </h1>

            <!-- Search/Create Form -->
            <form wire:submit.prevent="{{ $marcaId ? 'update' : 'create' }}" class="flex space-x-4">
                <div class="flex-1">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        wire:model="name"
                        placeholder="Cadastrar Marca"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                    />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Select status -->
                <div>
                    <select wire:model="status"
                        class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                        <option value="">Selecionar</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                     @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <button
                    type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 disabled:opacity-50"
                >
                    @if($marcaId)
                        Salvar
                    @else
                        Criar
                    @endif
                </button>
                @if($marcaId)
                    <button
                        type="button"
                        wire:click="$set('marcaId', null)"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200"
                    >
                        Cancelar
                    </button>
                @endif
            </form>
            <div class="mt-2 text-right">
                <span class="text-sm text-gray-500">{{ strlen($name ?? '') }}/280 caracteres</span>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Marcas
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($marcas as $marca)
                        <tr class="hover:bg-gray-50 {{ $marcaId === $marca->id ? 'bg-yellow-50' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $marca->id }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-900 max-w-md">
                                <p class="line-clamp-3">{{ $marca->name }}</p>
                            </td>

                             <td class="px-6 py-4 text-sm text-gray-900 max-w-md">
                                <p class="line-clamp-3">{{ $marca->status ? 'Ativo' : 'Inativo' }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                <button
                                    wire:click.prevent="edit({{ $marca->id }})"
                                    class="text-blue-600 hover:text-blue-900 transition-colors"
                                >
                                    Editar
                                </button>
                                <button
                                    wire:click.prevent="delete({{ $marca->id}})"
                                    class="text-red-600 hover:text-red-900 transition-colors"
                                >
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($marcas->hasPages())
            <div class="mt-8 flex justify-center">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                    {{ $marcas->links()}}
                </div>
            </div>
        @endif

    </div>
</div>


