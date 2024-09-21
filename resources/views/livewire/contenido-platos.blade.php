<div class="p-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        {{-- Parte superior de la tabla, buscar - crear --}}
        <div class="pb-4 bg-white dark:bg-gray-900">
            <div class="flex items-center justify-between p-2">

                {{-- seccion de busqueda --}}
                <label for="table-search" class="sr-only">Buscar</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input wire:model="buscar" type="text" id="table-search"
                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar Platos">
                </div>

                {{-- seccion del boton crear plato --}}
                <div class="ml-4">
                    @livewire('modal-crear-plato')
                </div>
            </div>
        </div>

        {{-- tabla de los platos --}}
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

            {{-- cabecera de la tabla --}}
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Disponible
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plato
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Editar/Eliminar
                    </th>
                </tr>
            </thead>

            {{-- cuerpo de la tabla --}}
            <tbody>

                @foreach ($platos as $plato)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        {{-- checkbox que tendra la utilidad de marcar platos disponibles --}}
                        <td class="px-2 py-2 text-center">
                            <div class="inline-flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">Disponibilidad</label>
                            </div>
                        </td>

                        <th scope="row" class="px-4 py-2 font-medium text-gray-900  dark:text-white">
                            {{ $plato->nombre }}
                        </th>

                        <td class="px-2 py-2">
                            {{ $plato->precio }} S/
                        </td>
                        <td class="px-2 py-2">
                            <img src="{{ $plato->imagen }}" alt="" class="w-30 h-20 object-cover rounded">
                        </td>
                        <td class="px-2 py-2">

                            <x-button class="m-2" wire:click="modalEditarPlato({{ $plato }})">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </x-button>

                            <x-danger-button class="m-2" wire:click="delete({{ $plato }})">
                                <i class="fa-regular fa-trash-can"></i>
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach

                {{-- modal para editar plato --}}
                <x-dialog-modal wire:model="openModalEditarPlato">

                    <x-slot name="title">
                        <h1>Editar Plato</h1>
                    </x-slot>

                    <x-slot name="content">

                        <input type="hidden" id="idEditarPlato" wire:model="idEditarPlato">

                        <x-label value="Nombre del plato" class="text-lg mb-2 cursor-pointer "
                            for="nombreEditarPlato" />
                        <input type="text" class="w-full p-2 mb-2 border dark:bg-gray-800 dark:text-white"
                            id="nombreEditarPlato" wire:model="nombreEditarPlato">
                        <x-input-error for="nombreEditarPlato" class="mb-2" />

                        <x-label value="Precio" class="text-lg mb-2 cursor-pointer" for="precioEditarPlato" />
                        <input type="number" class="w-full p-2 mb-2 border dark:bg-gray-800 dark:text-white"
                            id="precioEditarPlato" wire:model="precioEditarPlato">
                        <x-input-error for="precioEditarPlato" class="mb-2" />

                        <input type="file" name="imagenEditarPlato" class=" mb-2 cursor-pointer w-full p-2"
                            id="imagenEditarPlato" wire:model="imagenEditarPlato">

                        @if ($imagenEditarPlato)
                            <div class="flex justify-center mb-4">
                                <div class="w-96 h-64 overflow-hidden rounded-lg shadow-md">
                                    <img src="{{ is_string($imagenEditarPlato) ? $imagenEditarPlato : $imagenEditarPlato->temporaryUrl() }}"
                                        alt="Imagen del Plato" class="w-full h-full object-cover">
                                </div>
                            </div>
                        @endif

                        {{-- mensaje de carga cuando se sube una imagen --}}
                        <div class="text-center">
                            <div wire:loading wire:target="imagen" class="text-lg text-blue-300"> Cargando imagen,
                                un momento por favor... </div>
                        </div>

                    </x-slot>

                    <x-slot name="footer">
                        <x-button wire:click="actualizarPlatos" class="m-2">Actualizar</x-button>
                        <x-danger-button wire:click="$set('openModalEditarPlato', false)" class="m-2">Cerrar</x-button>
                    </x-slot>
                </x-dialog-modal>
            </tbody>
        </table>
    </div>




</div>
