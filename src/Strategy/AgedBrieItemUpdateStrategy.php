<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;

class AgedBrieItemUpdateStrategy  extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->quality()->increase();
    $this->sellIn()->decrement();

    $this->sellIn()->applyIfSellInBelow(
      $this->sellIn()->getConstsMinThreshold(),
      fn() => $this->quality()->increase()
    );
  }
}
