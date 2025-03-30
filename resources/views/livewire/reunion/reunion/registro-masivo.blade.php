<div>
    @if ($is_contenido)
        <div class="grid sm:grid-cols-1 md:grid-cols-6 gap-4 m-2">
            <div class="relative z-0 w-full mb-5 group sm:col-span-1 md:col-span-3">
                <input wire:model.live="buscar"
                wire:keydown="buscando" name="buscar" id="buscar" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="buscar" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 capitalize">Buscar</label>
            </div>
        </div>

        @if ($buscar)
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 m-4">
                    <thead class="text-xs text-gray-700 uppercase ">
                        <tr>
                            <th scope="col" class="px-6 py-3" >
                            </th>
                            <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('name')">
                                Nombre
                                @if ($ordena != 'name')
                                    <i class="fas fa-sort"></i>
                                @else
                                    @if ($ordenado=='ASC')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('coeficiente')">
                                Coeficiente
                                @if ($ordena != 'coeficiente')
                                    <i class="fas fa-sort"></i>
                                @else
                                    @if ($ordenado=='ASC')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('asistio')">
                                Asistio
                                @if ($ordena != 'asistio')
                                    <i class="fas fa-sort"></i>
                                @else
                                    @if ($ordenado=='ASC')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('codigo')">
                                Código
                                @if ($ordena != 'codigo')
                                    <i class="fas fa-sort"></i>
                                @else
                                    @if ($ordenado=='ASC')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('observaciones')">
                                Observaciones
                                @if ($ordena != 'observaciones')
                                    <i class="fas fa-sort"></i>
                                @else
                                    @if ($ordenado=='ASC')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unidades as $it)
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button type="button" wire:click.prevent="show({{$it->id}})" class="inline-flex items-center p-2 text-sm font-medium text-blue-600 bg-blue-100 border border-blue-200 rounded-s-lg hover:bg-blue-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-blue-700 dark:border-blue-600 dark:text-white dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            <i class="fa-solid fa-barcode"></i>
                                        </button>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                                    {{$it->name}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    {{$it->coeficiente}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    @switch($it->asistio)
                                        @case(0)
                                            No
                                            @break
                                        @case(1)
                                            Si
                                            @break
                                    @endswitch
                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                                    {{$it->codigo}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-justify font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    {{$it->observaciones}}
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @endif


    @endif

    @if ($is_barcode)

        <form class="max-w-md mx-auto"  wire:submit.prevent="cargar()">
            <h2 class=" text-center font-semibold uppercase">
                {{$elegido->name}} responsable: {{$elegido->unidad->responsable}}
            </h2>
            <div class="relative z-0 w-full mb-5 group">
                <input wire:model.live="codigo" name="codigo" id="codigo" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="codigo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Código de Barras</label>

            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cargar
            </button>
            <button type="button" wire:click.prevent="cancel" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancelar
            </button>
        </form>

    @endif

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('focusInput', () => {
                document.getElementById('codigo').focus();
            });
        });
    </script>

</div>
