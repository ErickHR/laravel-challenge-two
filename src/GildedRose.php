<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Factory\ItemUpdateStrategyFactory;

final class GildedRose
{
  /**
   * @param Item[] $items
   */
  public function __construct(
    private array $items,
    private ?ItemUpdateStrategyFactory $factory = null
  ) {
    $this->items = $items;
    $this->factory = $factory ?? new ItemUpdateStrategyFactory();
  }

  public function updateQuality(): void
  {
    foreach ($this->items as $item) {
      $strategy = $this->factory->create($item);
      $strategy->update();
    }
  }
}
