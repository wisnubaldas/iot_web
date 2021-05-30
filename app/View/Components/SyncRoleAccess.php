<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SyncRoleAccess extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $roles;
    public $access;
    public function __construct($roles,$access)
    {
        $this->roles = $roles;
        $this->access = $access;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sync-role-access');
    }
}
