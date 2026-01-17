<?php

declare(strict_types=1);

namespace GildedRose\Strategy\Base;

use GildedRose\Entity\ItemEntity;

abstract class BaseItemUpdateStrategy  implements ItemUpdateStrategyFactoryInterface
{

  protected ItemEntity $item;

  public function __construct(ItemEntity $item)
  {
    $this->item = $item;
  }
}
