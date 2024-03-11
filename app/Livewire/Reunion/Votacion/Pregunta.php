<?php

namespace App\Livewire\Reunion\Votacion;

use App\Models\Reuniones\Respuesta;
use App\Models\Reuniones\Votacion;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Pregunta extends Component
{
    public $preguntaele;
    public $reunion;
    public $pregunta;
    public $respuesta;
    public $observaciones;
    public $estNombre;
    public $name;
    public $status;
    public $est;

    public $is_masiva=false;
    public $is_estado=false;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($reunion, $est, $pregunta=null  ){

        $this->reset('reunion','preguntaele','est');
        $this->reunion=$reunion;
        $this->est=$est;
        if($pregunta){
            $this->preguntaele=Votacion::find($pregunta);
        }

        if($est>0){
            $this->detalles();
        }
    }

    public function detalles(){
        $this->name="Pregunta: ".$this->preguntaele->pregunta;
        switch ($this->preguntaele->status) {
            case 1:
                $this->status='Creada';
                break;

            case 2:
                $this->status='En Respuesta';
                break;

            case 3:
                $this->status='Cerrada';
                break;

            case 4:
                $this->status='Anulada';
                break;
        }

        switch ($this->est) {
            case 2:
                $this->estNombre='Respondiendo';
                break;

            case 3:
                $this->estNombre='Cerrando';
                break;

            case 4:
                $this->estNombre='Anulando';
                break;
        }

        $this->is_estado=!$this->is_estado;
    }

    //Activar evento
    #[On('cambiando')]
    //resetear variables
    public function cambiar(){
        $this->preguntaele->update([
            'status'            =>$this->est,
            'observaciones'     =>now().Auth::user()->name." Cambio la pregunta al estado: ".$this->estNombre." ----- ".$this->preguntaele->observaciones,
        ]);

        // Notificación
        $this->dispatch('alerta', name:'Se ha actualizado correctamente la pregunta: '.$this->preguntaele->pregunta);
        $this->resetFields();

        //refresh
        $this->dispatch('refresh');
        $this->is_estado=!$this->is_estado;
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
