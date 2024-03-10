<?php

namespace App\Livewire\Reunion\Reunion;

use App\Models\Reuniones\Quorum;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RegistroMasivo extends Component
{
    use WithPagination;

    public $reunion;
    public $buscar;
    public $busqueda;
    public $elegido;
    public $codigo;

    public $ordena='name';
    public $ordenado='ASC';
    public $pages = 15;

    public $is_barcode=false;
    public $is_contenido=true;


    public function mount($reunion){
        $this->reunion=$reunion;
    }

    public function buscando(){
        $this->resetPage();
        $this->busqueda=strtolower($this->buscar);
    }

    public function show($id){
        $this->elegido=Quorum::find($id);
        $this->is_barcode=!$this->is_barcode;
        $this->is_contenido=!$this->is_contenido;
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


    public function cargar(){
        $this->elegido->update([
            'codigo'        =>$this->codigo,
            'asistio'       =>1,
            'registra_id'   =>Auth::user()->id,
            'observaciones' =>now()." ".Auth::user()->name." registro la asistencia y cargo el código: ".$this->codigo." ----- ".$this->elegido->observaciones,
        ]);

        $this->cancel();
    }

    public function cancel(){
        $this->reset(
            'elegido',
            'codigo',
            'is_barcode',
            'is_contenido'
        );
    }

    private function unidades(){
        return Quorum::where('reunion_id', $this->reunion)
                        ->buscar($this->busqueda)
                        ->orderBy($this->ordena, $this->ordenado)
                        ->paginate($this->pages);
    }

    public function render()
    {
        return view('livewire.reunion.reunion.registro-masivo', [
            'unidades'=>$this->unidades(),
        ]);
    }
}
