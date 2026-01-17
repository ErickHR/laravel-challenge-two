<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;

class AgedBrieItemUpdateStrategy  extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->increaseQuality();
    $this->decreaseSellIn();
    $this->applyIfSellInBelow(self::MIN_SELL_IN, fn() => $this->increaseQuality());
  }
}
