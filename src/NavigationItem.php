<?php

declare(strict_types=1);

namespace Accelade\Navigation;

use Closure;

class NavigationItem
{
    protected string $label;

    protected ?string $icon = null;

    protected ?string $activeIcon = null;

    protected ?string $url = null;

    protected ?string $route = null;

    /** @var array<string, mixed> */
    protected array $routeParams = [];

    protected ?string $badge = null;

    protected ?string $badgeColor = null;

    protected int $sort = 0;

    protected bool $active = false;

    protected ?Closure $isActiveUsing = null;

    protected ?Closure $visible = null;

    protected bool $shouldOpenInNewTab = false;

    public function __construct(string $label)
    {
        $this->label = $label;
    }

    public static function make(string $label): static
    {
        return new static($label);
    }

    public function icon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function activeIcon(?string $icon): static
    {
        $this->activeIcon = $icon;

        return $this;
    }

    public function getActiveIcon(): ?string
    {
        return $this->activeIcon ?? $this->icon;
    }

    public function url(?string $url, bool $shouldOpenInNewTab = false): static
    {
        $this->url = $url;
        $this->shouldOpenInNewTab = $shouldOpenInNewTab;

        return $this;
    }

    public function getUrl(): ?string
    {
        if ($this->url !== null) {
            return $this->url;
        }

        if ($this->route !== null) {
            return route($this->route, $this->routeParams);
        }

        return null;
    }

    /**
     * @param  array<string, mixed>  $params
     */
    public function route(?string $route, array $params = []): static
    {
        $this->route = $route;
        $this->routeParams = $params;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function badge(?string $badge, ?string $color = null): static
    {
        $this->badge = $badge;
        $this->badgeColor = $color;

        return $this;
    }

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    public function getBadgeColor(): ?string
    {
        return $this->badgeColor;
    }

    public function sort(int $sort): static
    {
        $this->sort = $sort;

        return $this;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function isActiveWhen(Closure $callback): static
    {
        $this->isActiveUsing = $callback;

        return $this;
    }

    public function isActive(): bool
    {
        if ($this->isActiveUsing !== null) {
            return ($this->isActiveUsing)();
        }

        $url = $this->getUrl();
        if ($url === null) {
            return false;
        }

        if (! app()->bound('request')) {
            return false;
        }

        return request()->fullUrlIs($url.'*');
    }

    public function visible(Closure|bool $condition): static
    {
        $this->visible = is_bool($condition) ? fn () => $condition : $condition;

        return $this;
    }

    public function isVisible(): bool
    {
        if ($this->visible === null) {
            return true;
        }

        return ($this->visible)();
    }

    public function openInNewTab(bool $shouldOpen = true): static
    {
        $this->shouldOpenInNewTab = $shouldOpen;

        return $this;
    }

    public function shouldOpenInNewTab(): bool
    {
        return $this->shouldOpenInNewTab;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'icon' => $this->icon,
            'activeIcon' => $this->activeIcon,
            'url' => $this->getUrl(),
            'badge' => $this->badge,
            'badgeColor' => $this->badgeColor,
            'sort' => $this->sort,
            'isActive' => $this->isActive(),
            'isVisible' => $this->isVisible(),
            'openInNewTab' => $this->shouldOpenInNewTab,
        ];
    }
}
