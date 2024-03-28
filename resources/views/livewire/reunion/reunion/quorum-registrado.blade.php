<div>
    <dl class="grid max-w-screen-xl ring-2 rounded-lg text-center grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-3 dark:text-white sm:p-8">
        <h1 class="uppercase font-bold">
            quorum registrado
        </h1>
        <div class="flex flex-col items-center justify-center">
            <dt class="mb-2 text-3xl font-extrabold">{{$unidades}}</dt>
            <dd class="text-gray-500 dark:text-gray-400">Unidades Registradas</dd>
        </div>
        <div class="flex flex-col items-center justify-center">
            <dt class="mb-2 text-3xl font-extrabold">{{$coeficiente}} %</dt>
            <dd class="text-gray-500 dark:text-gray-400">Suma de coeficientes</dd>
        </div>
        @if ($unidmora>0)
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">{{$unidmora}}</dt>
                <dd class="text-gray-500 dark:text-gray-400">Unidades Registradas - mora</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">{{$coemora}} %</dt>
                <dd class="text-gray-500 dark:text-gray-400">Suma de coeficientes - mora</dd>
            </div>
        @endif

    </dl>
</div>
