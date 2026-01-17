<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Entity\ItemEntity;
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
      $itemEntity = new ItemEntity($item->name, $item->sellIn, $item->quality);
      $strategy = $this->factory->create($itemEntity);
      $strategy->update();

      $item->sellIn = $itemEntity->getSellIn()->getValue();
      $item->quality = $itemEntity->getQuality()->getValue();
    }
  }
}
