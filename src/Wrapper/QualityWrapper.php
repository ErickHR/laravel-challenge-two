<?php

declare(strict_types=1);

namespace GildedRose\Wrapper;

use GildedRose\Item;

class QualityWrapper
{
  public const MIN_THRESHOLD = 0;
  public const SECOND_THRESHOLD = 50;

  private Item $item;

  public function __construct(Item $item)
  {
    $this->item = $item;
  }

  public function increase(): void
  {
    if ($this->item->quality < self::SECOND_THRESHOLD) {
      $this->item->quality++;
    }
  }

  public function decrease(): void
  {
    if ($this->item->quality > self::MIN_THRESHOLD) {
      $this->item->quality--;
    }
  }

  public function getValue(): int
  {
    return $this->item->quality;
  }

  public function setValue(int $value): void
  {
    $this->item->quality = $value;
  }
}
