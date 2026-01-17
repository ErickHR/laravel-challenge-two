<?php

declare(strict_types=1);

namespace GildedRose\Strategy\Base;

use GildedRose\Entity\Quality;
use GildedRose\Entity\SellIn;

use GildedRose\Item;

abstract class BaseItemUpdateStrategy  implements ItemUpdateStrategyFactoryInterface
{

  protected Item $item;

  private ?Quality $quality = null;
  private ?SellIn $sellIn = null;

  public function __construct(Item $item)
  {
    $this->item = $item;
  }

  protected function quality(): Quality
  {

    if ($this->quality === null) {
      $this->quality = new Quality($this->item);
    }


    return $this->quality;
  }

  protected function sellIn(): SellIn
  {
    if ($this->sellIn === null) {
      $this->sellIn = new SellIn($this->item);
    }
    return $this->sellIn;
  }
}
