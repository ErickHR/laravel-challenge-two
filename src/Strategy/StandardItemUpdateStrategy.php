<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;

class StandardItemUpdateStrategy extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->quality()->decrease();
    $this->sellIn()->decrement();
    $this->sellIn()->applyIfSellInBelow(
      $this->sellIn()->getConstsMinThreshold(),
      fn() => $this->quality()->decrease()
    );
  }
}
