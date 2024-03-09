<?php

namespace App\Livewire\Reunion\Codigo;

use App\Traits\BarcodeTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CodigoBarras extends Component
{
    use BarcodeTrait;

    public $is_modify=true;
    public $texto;
    public $veces;
    public $cantidad;
    public $inicio;
    public $codigos=[];

    /* public function mount(){
        $this->codigo('10203040');
        array_push($this->codigos,$this->resultado);

        $this->codigo('77000326');
        array_push($this->codigos,$this->resultado);

        $this->imagen('10203040');
        $ruta=Storage::url($this->nombre);
        array_push($this->codigos,$ruta);

        $this->imagen('77000326');
        $ruta=Storage::url($this->nombre);
        array_push($this->codigos,$ruta);
    } */

    /**
     * Reglas de validación
     */
    protected $rules = [
        'texto'             => 'required|max:10',
        'veces'             => 'required|integer',
        'cantidad'          => 'required|integer',
        'inicio'            => 'required|integer',
    ];

    /**
     * Reset de todos los campos
     * @return void
     */
    public function resetFields(){
        $this->reset(
                        'texto',
                        'veces',
                        'cantidad',
                        'inicio',
                        'codigos',
                    );

    }

    // Crear Registro
    public function new(){

        $inicio=intval($this->inicio);
        $cantidad=intval($this->cantidad);

        // validate
        $this->validate();

        //eliminar datos anteriores
        $this->elimina();

        $registro=$inicio;

        for ($i=1; $i <= $cantidad; $i++) {

            $this->imagen($registro);
            $ruta=Storage::url($this->nombre);
            $nuevo=[
                "nombre"=>$this->val,
                "ruta"  =>$ruta,
            ];
            array_push($this->codigos,$nuevo);
            $registro++;
        }

        $this->is_modify=!$this->is_modify;

    }



    public function render()
    {
        return view('livewire.reunion.codigo.codigo-barras');
    }
}
