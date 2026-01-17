<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;

class BackstageItemUpdateStrategy extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->increaseQuality();
    $this->applyIfSellInBelow(self::BACKSTAGE_CRITICAL_THRESHOLD, fn() => $this->increaseQuality());
    $this->applyIfSellInBelow(self::BACKSTAGE_URGENT_THRESHOLD, fn() => $this->increaseQuality());
    $this->decreaseSellIn();
    $this->applyIfSellInBelow(self::MIN_SELL_IN, fn() => $this->setQuality(self::MIN_QUALITY));
  }
}
