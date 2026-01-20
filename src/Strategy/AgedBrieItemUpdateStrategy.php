<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;
use GildedRose\Wrapper\SellInWrapper;

class AgedBrieItemUpdateStrategy  extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->quality()->increase();
    $this->sellIn()->decrement();

    $this->sellIn()->applyIfSellInBelow(
      SellInWrapper::MIN_THRESHOLD,
      fn() => $this->quality()->increase()
    );
  }
}
