<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza la información de tu perfil y dirección de correo electrónico.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Foto') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-24 w-24 object-cover shadow-lg">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-24 h-24 bg-cover bg-no-repeat bg-center shadow-lg"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2 bg-blue-500 text-white hover:bg-blue-700" type="button"
                    x-on:click.prevent="$refs.photo.click()">
                    {{ __('Seleccionar Nueva Foto') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2 bg-red-500 text-white hover:bg-red-700"
                        wire:click="deleteProfilePhoto">
                        {{ __('Eliminar Foto') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" type="text"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                wire:model.defer="state.name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Correo Electrónico') }}" />
            <x-input id="email" type="email"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                wire:model.defer="state.email" autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 text-gray-600 dark:text-gray-400">
                    {{ __('Tu dirección de correo electrónico no está verificada.') }}

                    <button type="button"
                        class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent"
                        class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Guardado.') }}
        </x-action-message>

        <x-button class="bg-green-500 text-white hover:bg-green-700" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>
