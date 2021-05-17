<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RolesAccess extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $roles;
    public $id_table;
    public function __construct($roles,$idtable)
    {
        $this->roles = $roles;
        $this->id_table = $idtable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.roles-access');
    }
}
