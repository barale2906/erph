<?php

namespace App\Livewire\Reunion\Reunion;

use App\Models\Reuniones\Quorum;
use Livewire\Attributes\On;
use Livewire\Component;

class QuorumRegistrado extends Component
{
    public $actual;
    public $coeficiente;
    public $unidades;
    public $unidmora=0;
    public $coemora;

    public function mount($reunion){
        $this->actual=$reunion;
        $this->porcentaje();
        $this->cantidad();
        $this->moras();
        $this->morapor();
    }

    #[On('porcentuando')]
    public function porcentaje(){
        $this->coeficiente=Quorum::where('reunion_id', $this->actual)
                                    ->where('asistio', 1)
                                    ->sum('coeficiente');
    }

    #[On('contando')]
    public function cantidad(){
        $this->unidades=Quorum::where('reunion_id', $this->actual)
                                ->where('asistio', 1)
                                ->sum('asistio');
    }

    #[On('morando')]
    public function moras(){
        $this->unidmora=Quorum::where('reunion_id', $this->actual)
                                ->wherehas('unidad', function($query){
                                    $query->where('unidads.mora', 1);
                                })
                                ->where('asistio', 1)
                                ->sum('asistio');
    }

    #[On('moranpor')]
    public function morapor(){
        $this->coemora=Quorum::where('reunion_id', $this->actual)
                                ->wherehas('unidad', function($query){
                                    $query->where('unidads.mora', 1);
                                })
                                ->where('asistio', 1)
                                ->sum('coeficiente');
    }

    public function render()
    {
        return view('livewire.reunion.reunion.quorum-registrado');
    }
}
