<div>
    <div>
        <div class="p-4">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">

                <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold">
                                {{ $cantidadPlatos }}
                            </h2>
                            <div>PLATOS</div>
                        </div>
                        <div>
                            <i class="fa-solid fa-plate-wheat text-4xl transition-transform transform hover:scale-125"></i>
                        </div>
                    </div>
                    <a href="" class="block mt-4 text-blue-200 hover:text-blue-100">más información</a>
                </div>


                <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold">
                                {{ $cantidadSalas }}
                            </h2>
                            <div>SALAS</div>
                        </div>
                        <div>
                            <i class="fa-solid fa-house text-4xl transition-transform transform hover:scale-125"></i>
                        </div>
                    </div>
                    <a href="" class="block mt-4 text-green-200 hover:text-green-100">más información</a>
                </div>


                <div class="bg-red-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold">
                                {{ $cantidadUsuarios }}
                            </h2>
                            <div>USUARIOS</div>
                        </div>
                        <div>
                            <i class="fa-solid fa-user text-4xl transition-transform transform hover:scale-125"></i>
                        </div>
                    </div>
                    <a href="" class="block mt-4 text-red-200 hover:text-red-100">más información</a>
                </div>


                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold">
                                {{ $cantidadPedidos }}
                            </h2>
                            <div>PEDIDOS</div>
                        </div>
                        <div>
                            <i class="fa-solid fa-cart-shopping fa-fw text-4xl transition-transform transform hover:scale-125"></i>
                        </div>
                    </div>
                    <a href="" class="block mt-4 text-yellow-200 hover:text-yellow-100">más información</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8">
        {{-- futuro grafico con charts --}}
    </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</div>
