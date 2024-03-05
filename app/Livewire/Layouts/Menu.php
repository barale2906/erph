<?php

namespace App\Livewire\Layouts;

use App\Models\Configuracion\Menu as ConfiguracionMenu;
use App\Models\Ph\Propiedad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    private function menus(){
        return ConfiguracionMenu::where('status', true)
                    ->whereNull('menu_id')
                    ->with('submenus')
                    ->get();
    }

    private function copropiedad(){
        return Propiedad::where('id', Auth::user()->ph_id)->first();
    }

    public function render()
    {
        return view('livewire.layouts.menu', [
            'menus' => $this->menus(),
            'copropiedad'=>$this->copropiedad(),
        ]);
    }
}
