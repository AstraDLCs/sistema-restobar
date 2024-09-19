<div>
    <div>
        <div class="p-4">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">

                <div
                    class="bg-blue-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold">
                                {{ $cantidadPlatos }}
                            </h2>
                            <div>PLATOS</div>
                        </div>
                        <div>
                            <i
                                class="fa-solid fa-plate-wheat text-4xl transition-transform transform hover:scale-125"></i>
                        </div>
                    </div>
                    <a href="{{__('platos')}}" class="block mt-4 text-blue-200 hover:text-blue-100">más información</a>
                </div>


                <div
                    class="bg-green-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
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


                <div
                    class="bg-red-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
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


                <div
                    class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold">
                                {{ $cantidadPedidos }}
                            </h2>
                            <div>PEDIDOS</div>
                        </div>
                        <div>
                            <i
                                class="fa-solid fa-cart-shopping fa-fw text-4xl transition-transform transform hover:scale-125"></i>
                        </div>
                    </div>
                    <a href="" class="block mt-4 text-yellow-200 hover:text-yellow-100">más información</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 h-[500px] p-4 m-4 dark:bg-gray-800 dark:text-white rounded-3xl"> 

        {{-- canvas donde se mostrara la grafica --}}
        <canvas id="gananciasSemana" class="w-full h-full"></canvas>

        {{-- script de la grafica de ganancia semanal --}}
        <script>    
    
            const ctx = document.getElementById('gananciasSemana').getContext('2d');
            
            const chartGanancia = @json($chartGanancia);
            
            const labels = chartGanancia.map(item => item.fecha);
            const data = chartGanancia.map(item => item.ganancia);
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Ganancias de la semana',
                        data: data,
                        borderWidth: 1,
                        backgroundColor: 'rgba(50, 255, 200, 0.2)',
                        borderColor: 'rgba(0, 255, 255, 1)',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, 
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                color: 'white' // Color del texto en el eje X
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'white' // Color del texto en el eje Y
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: 'white' // Color del texto en la leyenda
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString('es-ES', {
                                        style: 'currency',
                                        currency: 'PEN'
                                    });
                                }
                            }
                        }
                    }
                }
            });
        </script>
    </div>
</div>
