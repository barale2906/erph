<?php

namespace App\Livewire\Reunion\Votacion;

use App\Models\Reuniones\Quorum;
use App\Models\Reuniones\Respuesta;
use App\Models\Reuniones\Resultado;
use App\Models\Reuniones\Votacion;
use Livewire\Component;
use Livewire\WithPagination;

class RespuestaMasiva extends Component
{
    use WithPagination;

    public $ordena='id';
    public $ordenado='DESC';
    public $pages = 15;

    public $respuesta;
    public $pregunta;
    public $codigo;


    protected $listeners = ['refresh' => '$refresh'];

    public function mount($respuesta){
        $this->respuesta=Respuesta::find($respuesta);
        $this->pregunta=Votacion::find($this->respuesta->votacion_id);
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

    //Numero de registros
    public function paginas($valor){
        $this->resetPage();
        $this->pages=$valor;
    }

    public function cargar(){

        $quo=Quorum::where('codigo', $this->codigo)
                    ->where('reunion_id', $this->pregunta->reunion_id)
                    ->get();

        if($quo->count()){
            foreach ($quo as $value) {

                $ya=Resultado::where('codigo', $this->codigo)
                            ->where('quorum_id', $value->id)
                            ->where('votacion_id', $this->pregunta->id)
                            ->first();

                if($ya){
                    $this->dispatch('alerta', name:'Ya se registro ese código para la pregunta: '.$this->pregunta->pregunta);
                    $this->reset('codigo');
                }else{

                    if($this->codigo!==""){
                        Resultado::create([
                            'votacion_id'       =>$this->pregunta->id,
                            'respuesta_id'      =>$this->respuesta->id,
                            'unidad_id'         =>$value->unidad_id,
                            'quorum_id'         =>$value->id,
                            'coeficiente'       =>$value->coeficiente,
                            'codigo'            =>$this->codigo
                        ]);
                    }


                    $this->reset('codigo');
                }
            }
        }else{
            $this->reset('codigo');
        }




    }

    private function conteo(){
        return Resultado::where('respuesta_id', $this->respuesta->id)
                        ->count('coeficiente');
    }

    private function porcentaje(){
        return Resultado::where('respuesta_id', $this->respuesta->id)
                        ->sum('coeficiente');
    }

    private function resultados(){
        return Resultado::where('respuesta_id', $this->respuesta->id)
                        ->orderBy($this->ordena, $this->ordenado)
                        ->paginate($this->pages);
    }

    public function render()
    {
        return view('livewire.reunion.votacion.respuesta-masiva',[
            'resultados'=>$this->resultados(),
            'conteo'=>$this->conteo(),
            'porcentaje'=>$this->porcentaje(),
        ]);
    }
}
