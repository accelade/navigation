<?php

declare(strict_types=1);

namespace Accelade\Navigation\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Nav extends Component
{
    public function __construct(
        public string $direction = 'vertical',
        public bool $collapsible = false,
    ) {}

    public function render(): View
    {
        return view('navigation::components.nav');
    }
}
