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

    public function mount($reunion){
        $this->actual=$reunion;
        $this->porcentaje();
        $this->cantidad();
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

    public function render()
    {
        return view('livewire.reunion.reunion.quorum-registrado');
    }
}
