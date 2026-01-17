<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Factory\ItemStrategyFactory;

final class GildedRose
{
  /**
   * @param Item[] $items
   */
  public function __construct(
    private array $items
  ) {}

  public function updateQuality(): void
  {
    $itemStrategyFactory = new ItemStrategyFactory();
    foreach ($this->items as $item) {
      $strategy = $itemStrategyFactory->create($item);
      $strategy->update();
    }
  }
}
