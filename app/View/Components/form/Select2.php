<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class Select2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $options;
    public function __construct($options = null)
    {
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select2');
    }
}
