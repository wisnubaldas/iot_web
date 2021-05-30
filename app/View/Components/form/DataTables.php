<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class DataTables extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $header = [];
    public $body;
    public function __construct($header,$body = null)
    {
        $this->header = $header;
        $this->body = $body;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.data-tables');
    }
}
