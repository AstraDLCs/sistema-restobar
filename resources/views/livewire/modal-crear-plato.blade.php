<div class="flex p-8">

    {{-- Boton para abrir el modal --}}
    <x-secondary-button class="ml-10" wire:click="$set('open',true)">
        Nuevo Plato
    </x-secondary-button>
    
    {{-- contenido del modal --}}
    <x-dialog-modal wire:model="open">

        {{-- titulo del modal --}}
        <x-slot name='title'>
            <span>Agregar Nuevo Plato</span>
        </x-slot>

        {{-- contenido del modal --}}
        <x-slot name='content'>

            <x-label value="Nombre del plato" class="text-lg mb-2 cursor-pointer " for="nombre" />
            <input type="text" class="w-full p-2 mb-2 border dark:bg-gray-800 dark:text-white" id="nombre" wire:model="nombre">
            <x-input-error for="nombre" class="mb-2" />

            <x-label value="Precio" class="text-lg mb-2 cursor-pointer" for="precio" />
            <input type="number" class="w-full p-2 mb-2 border dark:bg-gray-800 dark:text-white" id="precio" wire:model.defer="precio">
            <x-input-error for="precio" class="mb-2" />

            <input type="file" name="imagen" class="text-lg mb-2 cursor-pointer w-full p-2" id="imagen" wire:model.defer="imagen">
            <x-input-error for="imagen" class="mb-2" />

            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="">
            @endif

            {{-- mensaje de carga cuando se sube una imagen --}}
            <div class="text-center">
                <div wire:loading wire:target="imagen" class="text-lg text-blue-300"> Cargando imagen, un momento por favor... </div>
            </div>

        </x-slot>

        {{-- footer del modal con los botones de accion --}}
        <x-slot name='footer'>
            <span wire:loading class="text-white"> Guardando...</span>
            <x-danger-button class="mr-3" wire:click="$set('open',false)">
                Cancelar
            </x-danger-button>

            <x-button class="mr-2" wire:click="save">
                Registrar
            </x-button>
            
        </x-slot>
    </x-dialog-modal>
</div>