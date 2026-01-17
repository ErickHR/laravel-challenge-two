<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;

class AgedBrieItemUpdateStrategy  extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->item->getQuality()->increase();
    $this->item->getSellIn()->decrement();

    $this->item->getSellIn()->applyIfSellInBelow(
      $this->item->getSellIn()->getConstsMinThreshold(),
      fn() => $this->item->getQuality()->increase()
    );
  }
}
