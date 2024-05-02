<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public $menu = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menu = [
            ['name' => 'Welcome', 'url' => '/'],
            ['name' => 'Quests', 'url' => '/quests'],
            ['name' => 'Users', 'url' => '/users'],
            ['name' => 'Activity', 'url' => '/activities'],
            ['name' => 'MyQuests', 'url' => '/user/quests'],
            
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation');
    }
}
