<?php

declare(strict_types=1);

namespace Accelade\Navigation\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class NavItem extends Component
{
    public function __construct(
        public string $label,
        public ?string $href = null,
        public ?string $icon = null,
        public ?string $activeIcon = null,
        public ?string $badge = null,
        public ?string $badgeColor = null,
        public bool $active = false,
        public bool $external = false,
    ) {}

    public function render(): View
    {
        return view('navigation::components.nav-item');
    }
}
