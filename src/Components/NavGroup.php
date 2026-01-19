<?php

declare(strict_types=1);

namespace Accelade\Navigation\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class NavGroup extends Component
{
    public function __construct(
        public string $label,
        public ?string $icon = null,
        public bool $collapsible = true,
        public bool $collapsed = false,
    ) {}

    public function render(): View
    {
        return view('navigation::components.nav-group');
    }
}
