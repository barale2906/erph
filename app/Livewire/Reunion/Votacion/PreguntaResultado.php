<?php

namespace App\Livewire\Reunion\Votacion;

use App\Models\Reuniones\Votacion;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class PreguntaResultado extends Component
{
    public $evaluada;
    public $resultados;

    public function mount($pregunta){

        $this->evaluada=Votacion::find($pregunta);
        $this->totaliza();

    }

    #[On('totalizando')]
    public function totaliza(){
        $this->resultados=DB::table('resultados')
                            ->join('respuestas', 'resultados.respuesta_id', '=', 'respuestas.id')
                            ->where('resultados.votacion_id', $this->evaluada->id)
                            ->selectRaw('respuesta, count(respuesta_id) as total_respuesta, sum(coeficiente) as coeficiente')
                            ->groupBy('respuesta_id')
                            ->get();
    }

    public function render()
    {
        return view('livewire.reunion.votacion.pregunta-resultado');
    }
}
