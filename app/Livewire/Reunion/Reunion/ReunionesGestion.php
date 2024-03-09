<?php

namespace App\Livewire\Reunion\Reunion;

use App\Models\Ph\Unidad;
use App\Models\Reuniones\Quorum;
use App\Models\Reuniones\Reunion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReunionesGestion extends Component
{
    public $actual;
    public $tipo;

    public $fecha;
    public $hora;
    public $lugar;
    public $tip;
    public $archivo;


    public function mount($elegido=null, $tipo=null ){
        if($elegido){
            $this->actual=Reunion::find($elegido);
        }
        if($tipo){
            $this->tipo=$tipo;
        }else{
            $this->tipo=0;
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
