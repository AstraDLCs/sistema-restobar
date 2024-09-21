<x-app-layout>

    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">

        {{-- aqui esta el sidebar --}}
        @livewire('dashboard-sidebar-left')

        <div class="w-full bg-black">

            {{-- esta parte ocupara la parte superior haciendo de un falso nav bar solo para fines esteticos con la unica funcionalidad de un fullscreen, por ahora tendra un boton --}}
            <nav class="hidden md:flex justify-between items-center p-2 dark:bg-gray-800 text-black">
                <div>
                </div>
                <button id="fullscreen-btn"
                    class="bg-white text-black hover:bg-gray-700 hover:text-white font-bold py-2 px-4 rounded">
                    <i class="fa-solid fa-expand "></i>
                </button>
            </nav>
            {{-- mostramos el contenido del dashboard --}}

            <div class="bg-white dark:bg-gray-800 m-4 p-6 rounded-3xl shadow-lg">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Perfil de Usuario</h1>
                <div class="space-y-6">
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        @livewire('profile.update-profile-information-form')
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        @livewire('profile.update-password-form')
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        @livewire('profile.delete-user-form')
                    </div>
                </div>
            </div>

        </div>

</x-app-layout>


{{-- este script controla la funcionalidad fullscreen en el falso nav bar --}}
<script>
    document.getElementById('fullscreen-btn').addEventListener('click', function() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            }
        }
    });
</script>
