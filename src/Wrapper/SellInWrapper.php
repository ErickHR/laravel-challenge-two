<?php

declare(strict_types=1);

namespace GildedRose\Wrapper;

use GildedRose\Item;

class SellInWrapper
{

  protected const MIN_THRESHOLD = 0;
  protected const SECOND_THRESHOLD = 6;
  protected const THIRD_THRESHOLD = 11;

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

  public function applyIfSellInBelow($value, callable $action): void
  {
    if ($this->item->sellIn < $value) {
      $action();
    }
  }

  public function getValue(): int
  {
    return $this->item->sellIn;
  }

  public function getConstsMinThreshold(): int
  {
    return self::MIN_THRESHOLD;
  }

  public function getConstsSecondThreshold(): int
  {
    return self::SECOND_THRESHOLD;
  }

  public function getConstsThirdThreshold(): int
  {
    return self::THIRD_THRESHOLD;
  }
}
