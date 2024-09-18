<x-app-layout>

    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        
        {{-- aqui esta el sidebar --}}
        @livewire('dashboard-sidebar-left')

        <div class="w-full bg-black">

            {{-- esta parte ocupara la parte superior haciendo de un falso nav bar solo para fines esteticos con la unica funcionalidad de un fullscreen, por ahora tendra un boton --}}
            <nav class="hidden md:flex justify-between items-center p-2 dark:bg-gray-800 text-black">
                <div>
                </div>
                <button id="fullscreen-btn" class="bg-white text-black hover:bg-gray-700 hover:text-white font-bold py-2 px-4 rounded">
                    <i class="fa-solid fa-expand "></i>
                </button>
            </nav>
                {{-- mostramos el contenido de las configuraciones--}}
                @livewire('contenido-configuraciones')
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
