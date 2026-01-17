<?php

declare(strict_types=1);

namespace GildedRose\Entity;

class QualityValueObject
{
  private int $value;
  protected const MIN_THRESHOLD = 0;
  protected const SECOND_THRESHOLD = 50;

  public function __construct(int $value)
  {
    $this->value = $value;
  }

  public function increase(): void
  {
    if ($this->value < self::SECOND_THRESHOLD) {
      $this->value++;
    }
  }

  public function decrease(): void
  {
    if ($this->value > self::MIN_THRESHOLD) {
      $this->value--;
    }
  }

  public function getValue(): int
  {
    return $this->value;
  }

  public function setValue(int $value): void
  {
    $this->value = $value;
  }

  public function getConstsMinThreshold(): int
  {
    return self::MIN_THRESHOLD;
  }

  public function getConstsSecondThreshold(): int
  {
    return self::SECOND_THRESHOLD;
  }
}
