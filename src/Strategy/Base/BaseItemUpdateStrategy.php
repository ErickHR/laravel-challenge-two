<?php

declare(strict_types=1);

namespace GildedRose\Strategy\Base;

use GildedRose\Wrapper\QualityWrapper;
use GildedRose\Wrapper\SellInWrapper;

use GildedRose\Item;

abstract class BaseItemUpdateStrategy  implements ItemUpdateStrategyFactoryInterface
{

  protected Item $item;

  private ?QualityWrapper $quality = null;
  private ?SellInWrapper $sellIn = null;

  public function __construct(Item $item)
  {
    $this->item = $item;
  }

  protected function quality(): QualityWrapper
  {

    if ($this->quality === null) {
      $this->quality = new QualityWrapper($this->item);
    }


    return $this->quality;
  }

  protected function sellIn(): SellInWrapper
  {
    if ($this->sellIn === null) {
      $this->sellIn = new SellInWrapper($this->item);
    }
    return $this->sellIn;
  }
}
