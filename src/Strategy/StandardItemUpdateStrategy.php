<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;

class StandardItemUpdateStrategy extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->item->getQuality()->decrease();
    $this->item->getSellIn()->decrement();
    $this->item->getSellIn()->applyIfSellInBelow(
      $this->item->getSellIn()->getConstsMinThreshold(),
      fn() => $this->item->getQuality()->decrease()
    );
  }
}
