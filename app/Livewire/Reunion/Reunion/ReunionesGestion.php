<?php

namespace App\Livewire\Reunion\Reunion;

use App\Models\Ph\Unidad;
use App\Models\Reuniones\Quorum;
use App\Models\Reuniones\Reunion;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ReunionesGestion extends Component
{
    public $actual;
    public $tipo;
    public $name;
    public $status;
    public $statusNombre;
    public $estados;
    public $estNombre;

    public $is_form=true;
    public $is_ot=false;


    public $fecha;
    public $hora;
    public $lugar;
    public $tip;
    public $archivo;


    public function mount($elegido=null, $tipo=null ){
        if($elegido){
            $this->actual=Reunion::find($elegido);
            $this->detalles();
        }
        if($tipo){
            $this->tipo=$tipo;
        }else{
            $this->tipo=0;
        }

    }

    public function detalles(){

        $this->fecha=$this->actual->fecha;
        $this->hora=$this->actual->hora;
        $this->lugar=$this->actual->lugar;
        $this->tip=$this->actual->tipo;

        $this->name="La reunión con fecha: ".$this->actual->fecha." de tipo: ".$this->actual->tipo;
        switch ($this->actual->status) {
            case 0:
                $this->status='Convocada';
                break;
            case 1:
                $this->status='Activa';
                break;
            case 2:
                $this->status='Finalizada';
                break;
            case 3:
                $this->status='Anulada';
                break;
        }

        switch ($this->tipo) {
            case 1:
                $this->is_form=!$this->is_form;
                $this->is_ot=!$this->is_ot;
                $this->estados=1;
                $this->estNombre='Activar';
                break;

            case 2:
                $this->is_form=!$this->is_form;
                $this->is_ot=!$this->is_ot;
                $this->estados=3;
                $this->estNombre='Anular';
                break;

            case 3:
                $this->is_form=!$this->is_form;
                $this->is_ot=!$this->is_ot;
                $this->estados=2;
                $this->estNombre='Finalizar';
                break;
        }
    }

    /**
     * Reglas de validación
     */
    protected $rules = [
        'fecha'     => 'required',
        'hora'      => 'required',
        'lugar'     => 'required',
        'tip'       => 'required',
    ];


    /**
     * Reset de todos los campos
     * @return void
     */
    public function resetFields(){
        $this->reset(
                        'fecha',
                        'hora',
                        'lugar',
                        'tip'
                    );

    }

    public function new(){

        // validate
        $this->validate();

        $reu=Reunion::create([
            'convoca_id'    =>Auth::user()->id,
            'propiedad_id'  =>Auth::user()->ph_id,
            'fecha'     => $this->fecha,
            'hora'      => $this->hora,
            'lugar'     => $this->lugar,
            'tipo'      => $this->tip,
        ]);

        if($this->tip==="asamblea"){
            $unidades=Unidad::where('propiedad_id', Auth::user()->ph_id)
                            ->where('coeficiente', '>', 0)
                            ->get();

            foreach ($unidades as $value) {
                Quorum::create([
                    'reunion_id'    =>$reu->id,
                    'registra_id'   =>Auth::user()->id,
                    'unidad_id'     =>$value->id,
                    'coeficiente'   =>$value->coeficiente,
                    'observaciones' =>now().Auth::user()->name." creo la convocatoria",
                ]);
            }

        }


        // Notificación
        $this->dispatch('alerta', name:'Se ha creado correctamente la reunión con fecha: '.$reu->fecha);
        $this->resetFields();

        //refresh
        $this->dispatch('refresh');
        $this->dispatch('cancelando');
    }

    //Activar evento
    #[On('cambiando')]
    //resetear variables
    public function cambiar(){
        $this->actual->update([
            'status'=>$this->estados,
        ]);

        // Notificación
        $this->dispatch('alerta', name:'Se ha actualizado correctamente la reunión con fecha: '.$this->actual->fecha);
        $this->resetFields();

        //refresh
        $this->dispatch('refresh');
        $this->dispatch('cancelando');
    }

    private function unidades(){
        return Unidad::where('propiedad_id', Auth::user()->ph_id)
                        ->get();
    }


    public function render()
    {
        return view('livewire.reunion.reunion.reuniones-gestion',[
            'unidades'=>$this->unidades(),
        ]);
    }
}
