<?php

namespace App\Livewire\Reunion\Reunion;

use App\Models\Reuniones\Quorum;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Registrobarras extends Component
{
    public $codigo;
    public $reunion;

    public function mount($reunion){
        $this->reunion=$reunion;
    }

    public function cancel(){
        $this->reset(
            'codigo',
        );
    }

    public function cargar(){
        $elegido=Quorum::where('reunion_id', $this->reunion)
                        ->where('codigo', $this->codigo)
                        ->first();

        if (optional($elegido)->asistio > 0) {
            $this->dispatch('alerta', name: 'Ya se había registrado');
        } else {
            $elegido?->update([
                'asistio' => 1,
                'observaciones' => now()." ".Auth::user()->name." registro la asistencia. ----- "
            ]);
        }

        $this->cancel();

        $this->dispatch('porcentuando');
        $this->dispatch('contando');
        $this->dispatch('morando');
        $this->dispatch('moranpor');


    }

    public function render()
    {
        return view('livewire.reunion.reunion.registrobarras');
    }
}
