<?php

namespace App\Livewire\Ph\Unidad;

use App\Models\Ph\Propiedad;
use App\Models\Ph\Unidad;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Unidades extends Component
{
    use WithPagination;

    public $ordena='name';
    public $ordenado='ASC';
    public $pages = 15;

    public $is_modify = true;
    public $is_creating = false;
    public $buscar;
    public $busqueda;
    public $propiedadMenu;

    public function mount(){
        $this->propiedadMenu=Propiedad::where('id', Auth::user()->ph_id)->first();
    }



    protected $listeners = ['refresh' => '$refresh'];

    // Ordenar Registros
    public function organizar($campo){
        if($this->ordenado === 'ASC')
        {
            $this->ordenado = 'DESC';
        }else{
            $this->ordenado = 'ASC';
        }
        return $this->ordena = $campo;
    }

    //Numero de registros
    public function paginas($valor){
        $this->resetPage();
        $this->pages=$valor;
    }

    //Modificar registro
    public function show($id, $est){


        $this->is_modify=!$this->is_modify;
        $this->is_creating=!$this->is_creating;

    }

    //Actualiza ubicacion
    #[On('ubicando')]
    public function ubicar(){

    }

    //Activar evento
    #[On('cancelando')]
    //resetear variables
    public function cancela(){
        $this->reset(
                        'is_modify',
                        'is_creating'
                    );
    }

    //Activar evento
    #[On('created')]
    //Mostrar formulario de creación
    public function updatedIsCreating(){
        $this->is_modify = !$this->is_modify;
        $this->is_creating = !$this->is_creating;
    }

    private function unidades(){

        return Unidad::where('propiedad_id', Auth::user()->ph_id)
                    ->whereNull('unidad_id')
                    ->with('subunidads')
                    ->orderBy($this->ordena, $this->ordenado)
                    ->paginate($this->pages);

    }

    public function render()
    {
        return view('livewire.ph.unidad.unidades', [
            'unidades' =>$this->unidades(),
        ]);
    }
}
