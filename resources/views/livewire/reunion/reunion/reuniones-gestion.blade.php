<div>
    <h1 class=" text-center text-2xl uppercase font-extrabold">
        @if ($tipo===0)
            Genere una reunión
        @endif
    </h1>

    @if ($is_form)
        <form class="max-w-3xl mx-auto">
            <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4 ring mt-5 mb-5 bg-cyan-100 rounded-lg p-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model.live="fecha" name="fecha" id="fecha" type="date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="fecha" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Fecha de la reunión</label>
                    @error('fecha')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">¡IMPORTANTE!</span>  {{ $message }} .
                        </div>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model.live="hora" name="hora" id="hora" type="time" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="hora" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Hora de la reunión</label>
                    @error('hora')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">¡IMPORTANTE!</span>  {{ $message }} .
                        </div>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model.live="lugar" name="lugar" id="lugar" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="lugar" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Lugar de la reunión</label>
                    @error('lugar')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">¡IMPORTANTE!</span>  {{ $message }} .
                        </div>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <select wire:model.live="tip" id="tip" class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option>Elegir...</option>
                        <option value="asamblea">Asamblea</option>
                        <option value="contador">Contador</option>
                        <option value="consejo">Consejo</option>
                        <option value="otro">Otro</option>
                    </select>
                    <label for="tip" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tipo de reunión</label>
                    @error('tip')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">¡IMPORTANTE!</span>  {{ $message }} .
                        </div>
                    @enderror
                </div>

                <button type="button" wire:click.prevent="new" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800">
                    Generar
                </button>

                <button type="button" wire:click.prevent="$dispatch('cancelando')" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Cancelar
                </button>
            </div>
        </form>
    @endif

    @if ($is_quorum)


        <section class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
                <h1 class="mb-4 text-xl font-extrabold tracking-tight leading-none text-gray-900 md:text-2xl lg:text-3xl dark:text-white uppercase">
                    {{$actual->tipo}} del {{$actual->propiedad->nombre}}
                </h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200 capitalize">
                    Fecha: {{$actual->fecha}} a las {{$actual->hora}} en: {{$actual->lugar}} en este momento su estado es: {{$status}}
                </p>
                @if ($actual->status===1)
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
                    <livewire:reunion.reunion.quorum-registrado :reunion="$actual->id" />
                    <h1 class=" text-center font-bold sm:text-sm md:text-2xl">
                        A continuación se presentan las preguntas de esta reunión y sus respuestas.
                    </h1>
                    <div class="grid sm:grid-cols-1 md:grid-cols-3 gap-1 m-1">
                        @foreach ($actual->votaciones as $item)
                            <livewire:reunion.votacion.pregunta-resultado :pregunta="$item->id"/>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0"></div>
        </section>

        @if ($is_registromasivo)
            <livewire:reunion.reunion.registro-masivo :reunion="$reunion" />
        @endif


    @endif

    @if ($is_ot)
        @include('include.status')
    @endif
</div>
