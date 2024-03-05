<div>
    <h2 class=" text-center text-xl mb-5">
        A continuación se presentan las unidades para <span class=" font-extrabold uppercase">{{$propiedadMenu->nombre}}.</span>
        <a href="" wire:click.prevent="$dispatch('created')" class=" text-black bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center capitalize" >
            <i class="fa-solid fa-plus"></i> crear
        </a>
    </h2>
    @if ($is_modify)
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            @foreach ($unidades as $item)

                <h3 class=" text-center text-lg uppercase font-semibold">
                    {{$item->name}}
                </h3>
                @foreach ($item->subunidads as $it)
                    <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 m-4">
                        <thead class="text-xs text-gray-700 uppercase ">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                                    Coeficiente
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                                    {{$it->name}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-center font-extrabold bg-gray-50 dark:bg-gray-700 dark:text-gray-400 uppercase">
                                    {{$it->coeficiente}}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
                <div class="mt-2 p-1 w-auto rounded-lg grid grid-cols-2 gap-4 bg-blue-100">
                    <div>
                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                            <span class="ml-3 mr-3 text-sm font-medium text-gray-900 dark:text-gray-300">Registros:</span>
                            <select wire:click="paginas($event.target.value)" id="countries" class="w-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value=15>15</option>
                                <option value=20>20</option>
                                <option value=50>50</option>
                                <option value=100>100</option>
                                <option value=500>500</option>
                            </select>
                        </label>
                    </div>
                    <div>
                        {{ $unidades->links() }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @if ($is_creating)
        <livewire:diligencia.diligencia.diligencias-crear :elegido="$elegido" :tipo="$tipo"/>
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

