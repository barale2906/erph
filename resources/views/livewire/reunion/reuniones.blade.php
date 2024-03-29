<div>
    @if ($is_modify)
        <h2 class=" text-center text-xl mb-5">
            A continuación se presentan las reuniones programadas
            <a href="" wire:click.prevent="$dispatch('created')" class=" text-black bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center capitalize" >
                <i class="fa-solid fa-plus"></i> crear
            </a>
        </h2>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 m-4">
                <thead class="text-xs text-gray-700 uppercase ">
                    <tr>
                        <th scope="col" class="px-6 py-3" >
                        </th>
                        <th scope="col" class="px-6 py-3" >
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('fecha')">
                            Fecha
                            @if ($ordena != 'fecha')
                                <i class="fas fa-sort"></i>
                            @else
                                @if ($ordenado=='ASC')
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('lugar')">
                            Lugar
                            @if ($ordena != 'lugar')
                                <i class="fas fa-sort"></i>
                            @else
                                @if ($ordenado=='ASC')
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('hora')">
                            Hora
                            @if ($ordena != 'hora')
                                <i class="fas fa-sort"></i>
                            @else
                                @if ($ordenado=='ASC')
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3" style="cursor: pointer;" wire:click="organizar('tipo')">
                            Tipo
                            @if ($ordena != 'tipo')
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
                            Invitación
                        </th>
                        <th scope="col" class="px-6 py-3" >
                            Convoca
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reuniones as $it)
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-blue-100 border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                        <a href="" wire:click.prevent="show({{$it->id}},{{4}})" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <i class="fa-solid fa-door-open"></i>
                                        </a>
                                    </button>
                                    @if ($it->status===0)
                                        <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-green-100 border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            @can('reu_reunionEditar')
                                                <a href="" wire:click.prevent="show({{$it->id}},{{1}})" class="inline-flex items-center font-medium text-green-600 dark:text-green-500 hover:underline">
                                                    <i class="fa-solid fa-person-running"></i>
                                                </a>
                                            @endcan
                                        </button>
                                        <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-red-100 border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            @can('reu_reunionInactivar')
                                                <a href="" wire:click.prevent="show({{$it->id}},{{2}})" class="inline-flex items-center font-medium text-red-600 dark:text-red-500 hover:underline">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            @endcan
                                        </button>
                                    @endif
                                    @if ($it->status===1)
                                        <button type="button" class="inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-red-100 border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            @can('reu_reunionEditar')
                                                <a href="" wire:click.prevent="show({{$it->id}},{{3}})" class="inline-flex items-center font-medium text-red-600 dark:text-red-500 hover:underline">
                                                    <i class="fa-solid fa-calendar-xmark"></i>
                                                </a>
                                            @endcan
                                        </button>
                                    @endif

                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                @switch($it->status)
                                    @case(0)
                                        Convocada
                                        @break
                                    @case(1)
                                        Activa
                                        @break
                                    @case(2)
                                        Finalizada
                                        @break
                                    @case(3)
                                        Anulada
                                        @break
                                @endswitch
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                                {{$it->fecha}}
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                {{$it->lugar}}
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                                {{$it->hora}}
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                {{$it->tipo}}
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                                {{$it->ruta}}
                            </th>
                            <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                {{$it->convoca->name}}
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
                    {{ $reuniones->links() }}
                </div>
            </div>
        </div>
    @endif

    @if ($is_creating)
        <livewire:reunion.reunion.reuniones-gestion :elegido="$elegido" :tipo="$tipo"/>
    @endif

    @push('js')
        <script>
            document.addEventListener('livewire:initialized', function (){
                @this.on('alerta', (name)=>{
                    const variable = name;
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: variable['name'],
                        showConfirmButton: false,
                        timer: 2000
                    })
                });
            });
        </script>
    @endpush
</div>
