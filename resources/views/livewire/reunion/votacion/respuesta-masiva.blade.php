<div>
    <h1 class=" text-center font-extrabold">
        Cargar varios registros a la respuesta: <span class=" uppercase text-4xl">{{$respuesta->respuesta}}</span>
    </h1>

    <form class="max-w-md mx-auto"  wire:submit.prevent="cargar()">
        <div class="relative z-0 w-full mb-5 group">
            <input wire:model.live="codigo" name="codigo" id="codigo" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="codigo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Código de Barras</label>

        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Cargar
        </button>
    </form>
    <h1 class=" text-center uppercase font-extrabold text-4xl">
        {{$mora}}
    </h1>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 m-4">
            <thead class="text-xs text-gray-700 uppercase ">
                <tr>
                    <th colspan="3" >
                        Cantidad de unidades que votaron por esta respuesta: <span class=" font-extrabold text-lg">{{$conteo}}</span>, equivalente a: <span class=" font-extrabold text-lg">{{$porcentaje}} %</span>
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('unidad_id')">
                        Unidad
                        @if ($ordena != 'unidad_id')
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
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados as $it)
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                            {{$it->unidad_id}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                            {{$it->coeficiente}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                            {{$it->codigo}}
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="mt-2 p-1 w-auto rounded-lg grid grid-cols-2 gap-4 bg-blue-100">
            <div>
                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                    <span class="ml-3 mr-3 text-sm font-medium text-gray-900 dark:text-gray-300">Registros:</span>
                    <select wire:click="paginas($event.target.value)" id="countries" class="w-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value=15>15</option>
                        <option value=20>20</option>
                        <option value=50>50</option>
                        <option value=100>100</option>
                    </select>
                </label>
            </div>
            <div>
                {{ $resultados->links() }}
            </div>
        </div>
    </div>

</div>
