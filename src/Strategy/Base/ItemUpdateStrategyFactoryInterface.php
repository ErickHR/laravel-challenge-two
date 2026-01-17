<?php

declare(strict_types=1);

namespace GildedRose\Strategy\Base;

interface ItemUpdateStrategyFactoryInterface
{
  public function update(): void;
}
