<?php

declare(strict_types=1);

namespace GildedRose\Entity;

class SellInValueObject
{

  protected const MIN_THRESHOLD = 0;
  protected const SECOND_THRESHOLD = 6;
  protected const THIRD_THRESHOLD = 11;

  private int $value;

  public function __construct(int $value)
  {
    $this->value = $value;
  }

  public function decrement(): void
  {
    $this->value--;
  }

  public function isExpired(): bool
  {
    return $this->value < 0;
  }

  public function applyIfSellInBelow($value, callable $action): void
  {
    if ($this->value < $value) {
      $action();
    }
  }

  public function getValue(): int
  {
    return $this->value;
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
