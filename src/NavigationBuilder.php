<?php

declare(strict_types=1);

namespace Accelade\Navigation;

class NavigationBuilder
{
    /** @var array<NavigationGroup|NavigationItem> */
    protected array $items = [];

    public function group(string $label): NavigationGroupBuilder
    {
        return new NavigationGroupBuilder($this, $label);
    }

    public function item(string $label): NavigationItemBuilder
    {
        return new NavigationItemBuilder($this, $label);
    }

    public function addItem(NavigationGroup|NavigationItem $item): static
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return array<NavigationGroup|NavigationItem>
     */
    public function getItems(): array
    {
        return collect($this->items)
            ->filter(fn ($item) => $item->isVisible())
            ->sortBy(fn ($item) => $item->getSort())
            ->values()
            ->all();
    }
}

class NavigationGroupBuilder
{
    protected NavigationBuilder $builder;

    protected NavigationGroup $group;

    public function __construct(NavigationBuilder $builder, string $label)
    {
        $this->builder = $builder;
        $this->group = NavigationGroup::make($label);
    }

    public function icon(?string $icon): static
    {
        $this->group->icon($icon);

        return $this;
    }

    /**
     * @param  array<NavigationItem>  $items
     */
    public function items(array $items): static
    {
        $this->group->items($items);

        return $this;
    }

    public function sort(int $sort): static
    {
        $this->group->sort($sort);

        return $this;
    }

    public function collapsible(bool $collapsible = true): static
    {
        $this->group->collapsible($collapsible);

        return $this;
    }

    public function collapsed(bool $collapsed = true): static
    {
        $this->group->collapsed($collapsed);

        return $this;
    }

    public function register(): NavigationBuilder
    {
        $this->builder->addItem($this->group);

        return $this->builder;
    }
}

class NavigationItemBuilder
{
    protected NavigationBuilder $builder;

    protected NavigationItem $item;

    public function __construct(NavigationBuilder $builder, string $label)
    {
        $this->builder = $builder;
        $this->item = NavigationItem::make($label);
    }

    public function icon(?string $icon): static
    {
        $this->item->icon($icon);

        return $this;
    }

    public function activeIcon(?string $icon): static
    {
        $this->item->activeIcon($icon);

        return $this;
    }

    public function url(?string $url, bool $shouldOpenInNewTab = false): static
    {
        $this->item->url($url, $shouldOpenInNewTab);

        return $this;
    }

    /**
     * @param  array<string, mixed>  $params
     */
    public function route(?string $route, array $params = []): static
    {
        $this->item->route($route, $params);

        return $this;
    }

    public function badge(?string $badge, ?string $color = null): static
    {
        $this->item->badge($badge, $color);

        return $this;
    }

    public function sort(int $sort): static
    {
        $this->item->sort($sort);

        return $this;
    }

    public function register(): NavigationBuilder
    {
        $this->builder->addItem($this->item);

        return $this->builder;
    }
}
