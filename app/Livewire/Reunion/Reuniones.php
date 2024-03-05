<?php

namespace App\Livewire\Reunion;

use App\Models\Reuniones\Reunion;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Reuniones extends Component
{
    use WithPagination;

    public $ordena='fecha';
    public $ordenado='DESC';
    public $pages = 15;

    public $is_modify = true;
    public $is_creating = false;
    public $buscar;
    public $busqueda;
    public $propiedadMenu;

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

    private function reuniones(){

        return Reunion::where('propiedad_id', Auth::user()->ph_id)
                    ->orderBy($this->ordena, $this->ordenado)
                    ->paginate($this->pages);

    }
    public function render()
    {
        return view('livewire.reunion.reuniones',[
            'reuniones'=>$this->reuniones(),
        ]);
    }
}
