<?php

namespace App\Livewire\Reunion\Votacion;

use App\Models\Reuniones\Reunion;
use App\Models\Reuniones\Votacion;
use Livewire\Attributes\On;
use Livewire\Component;

class VotacionesGestion extends Component
{
    public $actual;
    public $estareu;
    public $elegido;
    public $pregunta_id;
    public $cuestiones;

    public $ordena='fecha';
    public $ordenado='DESC';

    public $is_lista=true;
    public $is_editar=false;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($elegido){
        $this->actual=Reunion::find($elegido);
        $this->detalles();
        $this->preguntas();
    }

    public function detalles(){

        switch ($this->actual->status) {
            case 0:
                $this->estareu='Convocada';
                break;
            case 1:
                $this->estareu='Activa';
                break;
            case 2:
                $this->estareu='Finalizada';
                break;
            case 3:
                $this->estareu='Anulada';
                break;
        }
    }

    //Activar evento
    #[On('preguntando')]
    public function preguntas(){
        $this->cuestiones=Votacion::where('reunion_id', $this->actual->id)
                                    ->get();
    }

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



    public function show($id=null){
        if($id){
            $this->pregunta_id=$id;
        }
        $this->mostrar();
    }

    public function vuelve(){
        $this->reset('pregunta_id');
        $this->mostrar();
    }

    public function mostrar(){
        $this->is_editar=!$this->is_editar;
        $this->is_lista=!$this->is_lista;
    }

    public function render()
    {
        return view('livewire.reunion.votacion.votaciones-gestion');
    }
}
