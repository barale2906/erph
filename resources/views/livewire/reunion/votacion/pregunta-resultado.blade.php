<div>
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <i class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3 text-5xl fa-solid fa-square-poll-vertical"></i>
        <a href="#">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                {{$evaluada->pregunta}}
            </h5>
        </a>
        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
            Estado de la pregunta:
            <span class=" font-extrabold">
                @switch($evaluada->status)
                    @case(1)
                        CREADA
                        @break
                    @case(2)
                        RESPONDIENDO
                        @break
                    @case(3)
                        CERRADA
                        @break
                    @case(4)
                        ANULADA
                        @break

                @endswitch
            </span>
            , tiene las siguientes observaciones: {{$evaluada->observaciones}}
        </p>
        @if ($resultados)

            @foreach ($resultados as $item)
                    <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white uppercase">
                            {{$item->respuesta}}
                        </h5>
                        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                            <div class="w-full sm:w-auto bg-cyan-800 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-cyan-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-cyan-700 dark:hover:bg-cyan-600 dark:focus:ring-cyan-700">
                                <i class="fa-solid fa-house"></i>
                                <div class="text-left rtl:text-right">
                                    <div class="mb-1 text-xs text-center">
                                        Unidades
                                    </div>
                                    <div class="-mt-1 font-sans text-sm text-center font-semibold">
                                        {{$item->total_respuesta}}
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <i class="fa-solid fa-chart-pie"></i>
                                <div class="text-left rtl:text-right">
                                    <div class="mb-1 text-xs text-center">
                                        Coeficiente
                                    </div>
                                    <div class="-mt-1 font-sans text-sm text-center font-semibold">
                                        {{$item->coeficiente}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        @else
            <h2 class=" text-center">
                Aún no se han registrado respuestas.
            </h2>
        @endif

    </div>
</div>
