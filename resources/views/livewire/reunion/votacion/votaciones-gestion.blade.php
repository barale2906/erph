<div>
    <section class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
            <h1 class="mb-4 text-xl font-extrabold tracking-tight leading-none text-gray-900 md:text-2xl lg:text-3xl dark:text-white uppercase">
                {{$actual->tipo}} del {{$actual->propiedad->nombre}}
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200 capitalize">
                Fecha: {{$actual->fecha}} a las {{$actual->hora}} en: {{$actual->lugar}} en este momento su estado es: <span class=" uppercase font-extrabold">{{$estareu}}</span>
            </p>
            <div class="inline-flex rounded-md shadow-sm" role="group">
                @can('reu_votacionCrear')
                    @if ($is_lista)
                        <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-blue-100 border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">

                                <a href="" wire:click.prevent="show(0,0)" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class="fa-solid fa-plus"></i> Pregunta
                                </a>

                        </button>
                    @else
                        <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-red-100 border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-red-500 dark:focus:text-white">

                                <a href="" wire:click.prevent="vuelve" class="inline-flex items-center font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <i class="fa-solid fa-angles-left"></i> Volver
                                </a>

                        </button>
                    @endif

                @endcan
            </div>
        </div>
        <div class="bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0"></div>
    </section>

    @if ($is_lista)
        <h2 class=" text-center text-xl mb-5">
            A continuación se presentan las preguntas programadas con sus respectivas respuestas
        </h2>
        <div class="grid sm:grid-cols-1 md:grid-cols-5 gap-4 ring mt-5 mb-5 rounded-lg p-5">
            <div></div>
            <div class="overflow-x-auto shadow-md sm:rounded-lg col-span-3">
                <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 m-4">
                    <thead class="text-xs text-gray-700 uppercase ">
                        <tr>
                            <th scope="col" class="px-6 py-3" >
                            </th>
                            <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('pregunta')">
                                Preguntas
                                @if ($ordena != 'pregunta')
                                    <i class="fas fa-sort"></i>
                                @else
                                    @if ($ordenado=='ASC')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3" >
                                Respuestas
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuestiones as $it)
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button type="button" wire:click.prevent="show({{$it->id}},{{0}})" class="inline-flex items-center p-2 text-sm font-medium text-blue-600 bg-blue-100 border border-blue-200 rounded-s-lg hover:bg-blue-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-blue-700 dark:border-blue-600 dark:text-white dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-500 dark:focus:text-white hover:underline">
                                            <i class="fa-solid fa-door-open"></i>
                                        </button>

                                        @if ($actual->status===0)
                                            <button type="button" wire:click.prevent="show({{$it->id}},{{4}})" class="inline-flex items-center p-2 text-sm font-medium text-red-600 bg-red-100 border-t border-b border-red-200 hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700 dark:bg-red-700 dark:border-red-600 dark:text-white dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-500 dark:focus:text-white hover:underline">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        @endif


                                        @if ($actual->status===1)
                                            @switch($it->status)
                                                @case(1)
                                                    <button type="button" wire:click.prevent="show({{$it->id}},{{2}})" class="inline-flex items-center p-2 text-sm font-medium text-green-600 bg-green-100 border-t border-b border-green-200 hover:bg-green-100 hover:text-green-700 focus:z-10 focus:ring-2 focus:ring-green-700 focus:text-green-700 dark:bg-gray-700 dark:border-green-600 dark:text-white dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-500 dark:focus:text-white hover:underline">

                                                        <i class="fa-solid fa-jet-fighter-up"></i>

                                                    </button>

                                                    <button type="button" wire:click.prevent="show({{$it->id}},{{4}})" class="inline-flex items-center p-2 text-sm font-medium text-red-600 bg-red-100 border-t border-b border-red-200 hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700 dark:bg-red-700 dark:border-red-600 dark:text-white dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-500 dark:focus:text-white hover:underline">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    @break
                                                @case(2)
                                                    <button type="button" wire:click.prevent="show({{$it->id}},{{3}})" class="inline-flex items-center p-2 text-sm font-medium text-green-600 bg-green-100 border-t border-b border-green-200 hover:bg-green-100 hover:text-green-700 focus:z-10 focus:ring-2 focus:ring-green-700 focus:text-green-700 dark:bg-green-700 dark:border-green-600 dark:text-white dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-500 dark:focus:text-white hover:underline">
                                                        <i class="fa-solid fa-folder-closed"></i>
                                                    </button>
                                                    @break

                                            @endswitch
                                        @endif
                                    </div>

                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    {{$it->pregunta}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    @foreach ($it->respuestas as $item)
                                        <span class="bg-blue-100 text-blue-800 text-lg capitalize font-semibold inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                            </svg>
                                            {{$item->respuesta}}
                                        </span>
                                    @endforeach
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class=" col-span-2">

            </div>
        </div>
    @endif

    @if ($is_editar)
        <livewire:reunion.votacion.pregunta :reunion="$actual->id" :pregunta="$pregunta_id" :est="$est"/>
    @endif


</div>
