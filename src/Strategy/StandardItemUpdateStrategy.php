<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;
use GildedRose\Wrapper\SellInWrapper;

class StandardItemUpdateStrategy extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->quality()->decrease();
    $this->sellIn()->decrement();
    $this->sellIn()->applyIfSellInBelow(
      SellInWrapper::MIN_THRESHOLD,
      fn() => $this->quality()->decrease()
    );
  }
}
