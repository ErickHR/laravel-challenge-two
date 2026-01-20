<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Strategy\Base\BaseItemUpdateStrategy;

use GildedRose\Wrapper\SellInWrapper;
use GildedRose\Wrapper\QualityWrapper;

class BackstageItemUpdateStrategy extends BaseItemUpdateStrategy
{
  public function update(): void
  {
    $this->quality()->increase();
    $this->sellIn()->applyIfSellInBelow(
      SellInWrapper::THIRD_THRESHOLD,
      fn() => $this->quality()->increase()
    );

    $this->sellIn()->applyIfSellInBelow(
      SellInWrapper::SECOND_THRESHOLD,
      fn() => $this->quality()->increase()
    );

    $this->sellIn()->decrement();

    $this->sellIn()->applyIfSellInBelow(
      SellInWrapper::MIN_THRESHOLD,
      fn() => $this->quality()->setValue(QualityWrapper::MIN_THRESHOLD)
    );
  }
}
