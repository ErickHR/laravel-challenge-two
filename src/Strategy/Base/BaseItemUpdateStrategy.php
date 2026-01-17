<?php

declare(strict_types=1);

namespace GildedRose\Strategy\Base;

use GildedRose\Item;

abstract class BaseItemUpdateStrategy  implements ItemUpdateStrategyFactoryInterface
{

  protected const MAX_QUALITY = 50;
  protected const MIN_QUALITY = 0;

  protected const MIN_SELL_IN = 0;
  protected const BACKSTAGE_URGENT_THRESHOLD = 6;
  protected const BACKSTAGE_CRITICAL_THRESHOLD = 11;

  protected Item $item;

  public function __construct(Item $item)
  {
    $this->item = $item;
  }

  protected function increaseQuality(): void
  {
    if ($this->item->quality < self::MAX_QUALITY) {
      $this->item->quality++;
    }
  }

  protected function decreaseQuality(): void
  {
    if ($this->item->quality > self::MIN_QUALITY) {
      $this->item->quality--;
    }
  }

  protected function setQuality(int $quality): void
  {
    $this->item->quality = $quality;
  }

  protected function decreaseSellIn(): void
  {
    $this->item->sellIn--;
  }

  protected function applyIfSellInBelow($value, callable $action): void
  {
    if ($this->item->sellIn < $value) {
      $action();
    }
  }
}
