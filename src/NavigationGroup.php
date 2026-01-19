<?php

declare(strict_types=1);

namespace Accelade\Navigation;

use Closure;

class NavigationGroup
{
    protected string $label;

    protected ?string $icon = null;

    /** @var array<NavigationItem> */
    protected array $items = [];

    protected int $sort = 0;

    protected bool $collapsible = true;

    protected bool $collapsed = false;

    protected ?Closure $visible = null;

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

    /**
     * @param  array<NavigationItem>  $items
     */
    public function items(array $items): static
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return array<NavigationItem>
     */
    public function getItems(): array
    {
        return collect($this->items)
            ->filter(fn (NavigationItem $item) => $item->isVisible())
            ->sortBy(fn (NavigationItem $item) => $item->getSort())
            ->values()
            ->all();
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

    public function collapsible(bool $collapsible = true): static
    {
        $this->collapsible = $collapsible;

        return $this;
    }

    public function isCollapsible(): bool
    {
        return $this->collapsible;
    }

    public function collapsed(bool $collapsed = true): static
    {
        $this->collapsed = $collapsed;

        return $this;
    }

    public function isCollapsed(): bool
    {
        return $this->collapsed;
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

    public function getLabel(): string
    {
        return $this->label;
    }

    public function hasActiveItem(): bool
    {
        return collect($this->items)->contains(fn (NavigationItem $item) => $item->isActive());
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'icon' => $this->icon,
            'items' => collect($this->getItems())->map->toArray()->all(),
            'sort' => $this->sort,
            'collapsible' => $this->collapsible,
            'collapsed' => $this->collapsed,
            'isVisible' => $this->isVisible(),
            'hasActiveItem' => $this->hasActiveItem(),
        ];
    }
}
