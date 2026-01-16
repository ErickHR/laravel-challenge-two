<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
  /**
   * @param Item[] $items
   */
  public function __construct(
    private array $items
  ) {}

  public function addQualityIfBelow50($item)
  {
    if ($item->quality < 50) {
      $item->quality = $item->quality + 1;
    }
  }

  public function addQualityIfGreaterThan0($item)
  {
    if ($item->quality > 0) {
      $item->quality = $item->quality - 1;
    }
  }

  public function passBack($item)
  {
    $this->addQualityIfBelow50($item);

    if ($item->sellIn < 11) $this->addQualityIfBelow50($item);
    if ($item->sellIn < 6) $this->addQualityIfBelow50($item);

    $item->sellIn = $item->sellIn - 1;

    if ($item->sellIn < 0)  $item->quality = 0;
  }

  public function passSulfuras($item) {}

  public function passAgedBrie($item)
  {
    $this->addQualityIfBelow50($item);

    $item->sellIn = $item->sellIn - 1;

    if ($item->sellIn < 0) $this->addQualityIfBelow50($item);
  }

  public function passAnother($item)
  {
    $this->addQualityIfGreaterThan0($item);

    $item->sellIn = $item->sellIn - 1;

    if ($item->sellIn < 0) $this->addQualityIfGreaterThan0($item);
  }

  public function updateQuality(): void
  {
    foreach ($this->items as $item) {
      if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
        $this->passBack($item);
      } else if ($item->name == 'Sulfuras, Hand of Ragnaros') {
        $this->passSulfuras($item);
      } else if ($item->name == 'Aged Brie') {
        $this->passAgedBrie($item);
      } else {
        $this->passAnother($item);
      }
    }
  }
}
