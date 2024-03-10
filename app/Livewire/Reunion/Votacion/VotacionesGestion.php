<?php

namespace App\Livewire\Reunion\Votacion;

use App\Models\Reuniones\Reunion;
use Livewire\Component;

class VotacionesGestion extends Component
{
    public $actual;
    public $estareu;

    public $ordena='fecha';
    public $ordenado='DESC';

    public $is_lista=true;
    public $is_editar=false;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($elegido){
        $this->actual=Reunion::find($elegido);
        $this->detalles();
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

    public function render()
    {
        return view('livewire.reunion.votacion.votaciones-gestion');
    }
}
