<?php

namespace App\Livewire\Reunion\Votacion;

use App\Models\Reuniones\Reunion;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Votaciones extends Component
{
    use WithPagination;

    public $ordena='fecha';
    public $ordenado='DESC';
    public $pages = 15;

    public $is_modify = true;
    public $is_creating = false;
    public $elegido;

    protected $listeners = ['refresh' => '$refresh'];

    public function show($id){

        $this->is_modify=!$this->is_modify;
        $this->is_creating = !$this->is_creating;
        $this->elegido=$id;
    }

    //Activar evento
    #[On('cancelando')]
    //resetear variables
    public function cancela(){
        $this->reset(
                        'is_modify',
                        'is_creating'
                    );
    }

    private function reuniones(){

        return Reunion::where('propiedad_id', Auth::user()->ph_id)
                    ->orderBy($this->ordena, $this->ordenado)
                    ->paginate($this->pages);

    }

    public function render()
    {
        return view('livewire.reunion.votacion.votaciones',[
            'reuniones'=>$this->reuniones(),
        ]);
    }
}
