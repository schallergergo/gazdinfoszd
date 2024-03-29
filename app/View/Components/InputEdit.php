<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputEdit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
    
        public string $type,
        public string $name,
        public string $displayname,
        public string $isrequired,
        public string $value
        )

    {
        $this->type=$type;
        $this->displayname = $displayname;
        $this->name = $name;
        $this->isrequired =$isrequired;
        $this->value =$value;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-edit');
    }
}
