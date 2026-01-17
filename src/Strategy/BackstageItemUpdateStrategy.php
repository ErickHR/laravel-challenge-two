<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;

class BackstageItemUpdateStrategy extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->quality()->increase();
    $this->sellIn()->applyIfSellInBelow(
      $this->sellIn()->getConstsThirdThreshold(),
      fn() => $this->quality()->increase()
    );

    $this->sellIn()->applyIfSellInBelow(
      $this->sellIn()->getConstsSecondThreshold(),
      fn() => $this->quality()->increase()
    );

    $this->sellIn()->decrement();

    $this->sellIn()->applyIfSellInBelow(
      $this->sellIn()->getConstsMinThreshold(),
      fn() => $this->quality()->setValue($this->quality()->getConstsMinThreshold())
    );
  }
}
