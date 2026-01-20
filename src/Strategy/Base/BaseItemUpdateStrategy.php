<?php

declare(strict_types=1);

namespace GildedRose\Strategy\Base;

use GildedRose\Wrapper\QualityWrapper;
use GildedRose\Wrapper\SellInWrapper;

use GildedRose\Item;

abstract class BaseItemUpdateStrategy  implements ItemUpdateStrategyInterface
{

  protected Item $item;

  private ?QualityWrapper $quality = null;
  private ?SellInWrapper $sellIn = null;

  public function __construct(QualityWrapper $quality, SellInWrapper $sellIn)
  {
    if ($quality === null) {
      $this->quality = new QualityWrapper($this->item);
    } else {
      $this->quality = $quality;
    }

    if ($sellIn === null) {
      $this->sellIn = new SellInWrapper($this->item);
    } else {
      $this->sellIn = $sellIn;
    }
  }

  protected function quality(): QualityWrapper
  {
    return $this->quality;
  }

  protected function sellIn(): SellInWrapper
  {
    return $this->sellIn;
  }

  public function setItem(Item $item): void
  {
    $this->item = $item;
  }
}
