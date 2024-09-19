<div class="flex items-center justify-center min-h-screen">
    <x-form-section submit="submitForm" class="dark:bg-gray-700 rounded-2xl p-4 m-4">
        <x-slot name="title">
            Configuraciones del Sistema
        </x-slot>

        <x-slot name="description">
            Desde aquí puedes manejar las configuraciones del sistema para que se muestren en la página de contacto.
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="nombre" value="Nombre" />
                <x-input id="nombre" type="text" class="mt-1 block w-full" wire:model.defer="nombre" />
                <x-input-error for="nombre" class="mt-2" />

                <x-label for="telefono" value="Teléfono" />
                <x-input id="telefono" type="number" class="mt-1 block w-full" wire:model.defer="telefono" />
                <x-input-error for="telefono" class="mt-2" />

                <x-label for="email" value="E-mail" />
                <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="email" />
                <x-input-error for="email" class="mt-2" />

                <x-label for="direccion" value="Dirección" />
                <x-input id="direccion" type="text" class="mt-1 block w-full" wire:model.defer="direccion" />
                <x-input-error for="direccion" class="mt-2" />

                <x-label for="mensaje" class="text-lg mb-2 cursor-pointer" value="Mensaje" />
                <textarea id="mensaje" name="mensaje"
                    class="w-full max-h-48 h-48 p-2 mb-2 dark:bg-gray-900 dark:text-white rounded-2xl" 
                    wire:model.defer="mensaje"></textarea>
                <x-input-error for="mensaje" class="mb-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <div class="flex space-x-4">
                <span id="savingMessage" class="hidden text-white bg-green-500 rounded-lg p-2">Guardando...</span>
                <span id="cancellingMessage" class="hidden text-white bg-red-500 rounded-lg p-2">Cancelando...</span>
        
                <button wire:click="resetForm" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="showMessage('cancellingMessage')">
                    Cancelar
                </button>
        
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="showMessage('savingMessage')">
                    Guardar
                </button>
            </div>
        
            <script>
                function showMessage(id) {
                    const messageElement = document.getElementById(id);
                    messageElement.classList.remove('hidden');
                    setTimeout(() => {
                        messageElement.classList.add('hidden');
                    }, 1000);
                }
            </script>
        </x-slot>
    </x-form-section>


</div>