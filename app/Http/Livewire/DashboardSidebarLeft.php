<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashboardSidebarLeft extends Component
{
    public $user;

    public $isCollapsed = false;
    public $openMenus = [
        'ventas' => false,
        'ajustes' => false,
    ];

    public function toggleCollapse()
    {
        $this->isCollapsed = !$this->isCollapsed;
    }

    public function toggleMenu($menu)
    {
        $this->openMenus[$menu] = !$this->openMenus[$menu];
    }
    public function mount()
    {
        $this->user = Auth::user();
    }
    public function render()
    {
        return view('livewire.dashboard-sidebar-left');
    }
}
