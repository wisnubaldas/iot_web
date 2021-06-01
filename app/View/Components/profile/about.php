<?php

namespace App\View\Components\profile;

use Illuminate\View\Component;

class about extends Component
{
    public $profile;   
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($profile)
    {
        $this->profile = $profile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile.about');
    }
}
