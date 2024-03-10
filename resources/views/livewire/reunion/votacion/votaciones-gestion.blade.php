<div>
    <section class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
            <h1 class="mb-4 text-xl font-extrabold tracking-tight leading-none text-gray-900 md:text-2xl lg:text-3xl dark:text-white uppercase">
                {{$actual->tipo}} del {{$actual->propiedad->nombre}}
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200 capitalize">
                Fecha: {{$actual->fecha}} a las {{$actual->hora}} en: {{$actual->lugar}} en este momento su estado es: {{$estareu}}
            </p>
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-blue-100 border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    @can('reu_reunionEditar')
                        <a href="" wire:click.prevent="registro" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <i class="fa-solid fa-check-double"></i> Registro
                        </a>
                    @endcan
                </button>
                <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-green-100 border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    @can('reu_reunionEditar')
                        <a href="" wire:click.prevent="votacion" class="inline-flex items-center font-medium text-green-600 dark:text-green-500 hover:underline">
                            <i class="fa-solid fa-barcode"></i> Votos
                        </a>
                    @endcan
                </button>
                <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-cyan-100 border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    @can('reu_votar')
                        <a href="#" wire:click.prevent="votar" class="inline-flex items-center font-medium text-cyan-600 dark:text-cyan-500 hover:underline">
                            <i class="fa-solid fa-check-to-slot"></i> Votar
                        </a>
                    @endcan
                </button>
            </div>
        </div>
        <div class="bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0"></div>
    </section>

    @if ($is_lista)
        <h2 class=" text-center text-xl mb-5">
            A continuación se presentan las preguntas programadas con sus respectivas respuestas
        </h2>
        <div class="grid sm:grid-cols-1 md:grid-cols-5 gap-4 ring mt-5 mb-5 rounded-lg p-5">
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
                        @foreach ($actual->votaciones as $it)
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-blue-100 border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            <a href="" wire:click.prevent="show({{$it->id}})" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                <i class="fa-solid fa-door-open"></i>
                                            </a>
                                        </button>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                                    {{$it->pregunta}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    @foreach ($it->respuestas as $item)
                                        loki
                                    @endforeach
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    @endif

    @if ($is_editar)

    @endif
</div>