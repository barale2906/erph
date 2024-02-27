<?php

namespace App\Livewire\Layouts;

use App\Models\Configuracion\Menu as ConfiguracionMenu;
use Livewire\Component;

class Menu extends Component
{
    private function menus(){
        return ConfiguracionMenu::where('status', true)
                    ->whereNull('menu_id')
                    ->with('submenus')
                    ->get();
    }

    public function render()
    {
        return view('livewire.layouts.menu', [
            'menus' => $this->menus(),
        ]);
    }
}
