<?php

declare(strict_types=1);

namespace GildedRose\Wrapper;

use GildedRose\Item;

class SellInWrapper
{

  public const MIN_THRESHOLD = 0;
  public const SECOND_THRESHOLD = 6;
  public const THIRD_THRESHOLD = 11;

  private Item $item;

  public function __construct(Item $item)
  {
    $this->item = $item;
  }

  public function decrement(): void
  {
    $this->item->sellIn--;
  }

  public function isExpired(): bool
  {
    return $this->item->sellIn < 0;
  }

  public function applyIfSellInBelow(int $value, callable $action): void
  {
    if ($this->item->sellIn < $value) {
      $action();
    }
  }

  public function getValue(): int
  {
    return $this->item->sellIn;
  }
}
