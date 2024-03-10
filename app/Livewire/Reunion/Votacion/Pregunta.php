<?php

namespace App\Livewire\Reunion\Votacion;

use App\Models\Reuniones\Respuesta;
use App\Models\Reuniones\Votacion;
use Livewire\Component;

class Pregunta extends Component
{
    public $preguntaele;
    public $reunion;
    public $pregunta;
    public $respuesta;
    public $observaciones;
    public $name;
    public $status;

    public $is_respuestas=false;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($reunion, $pregunta=null ){
        $this->reset('reunion','preguntaele');
        $this->reunion=$reunion;
        if($pregunta){
            $this->preguntaele=Votacion::find($pregunta);
        }
    }

    /**
     * Reglas de validación
     */
    protected $rules = [
        'pregunta'     => 'required',
    ];


    /**
     * Reset de todos los campos
     * @return void
     */
    public function resetFields(){
        $this->reset(
                        'pregunta',
                        'observaciones',
                    );

    }

    public function new(){
        // validate
        $this->validate();

        $this->preguntaele=Votacion::create([
            'reunion_id'    =>$this->reunion,
            'pregunta'      =>strtolower($this->pregunta),
            'observaciones' =>$this->observaciones,
        ]);

        // Notificación
        $this->dispatch('alerta', name:'Se ha creado correctamente la pregunta: '.$this->preguntaele->pregunta.", genere las posibles respuestas.");
        $this->dispatch('preguntando');
        $this->dispatch('refresh');
        $this->is_respuestas=true;
        $this->resetFields();


    }

    public function crearespuestas(){
        Respuesta::create([
            'votacion_id'   =>$this->preguntaele->id,
            'respuesta'     =>strtolower($this->respuesta)
        ]);

        $this->dispatch('refresh');
        $this->dispatch('alerta', name:'Se ha creado correctamente la respuesta: '.$this->respuesta);
        $this->reset('respuesta');
    }

    public function render()
    {
        return view('livewire.reunion.votacion.pregunta');
    }
}
