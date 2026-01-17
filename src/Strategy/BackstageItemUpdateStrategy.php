<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;

class BackstageItemUpdateStrategy extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->item->getQuality()->increase();
    $this->item->getSellIn()->applyIfSellInBelow(
      $this->item->getSellIn()->getConstsThirdThreshold(),
      fn() => $this->item->getQuality()->increase()
    );
    $this->item->getSellIn()->applyIfSellInBelow(
      $this->item->getSellIn()->getConstsSecondThreshold(),
      fn() => $this->item->getQuality()->increase()
    );
    $this->item->getSellIn()->decrement();

    $this->item->getSellIn()->applyIfSellInBelow(
      $this->item->getSellIn()->getConstsMinThreshold(),
      fn() => $this->item->getQuality()->setValue($this->item->getQuality()->getConstsMinThreshold())
    );
  }
}
