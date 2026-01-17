<?php

declare(strict_types=1);

namespace GildedRose\Entity;

class ItemEntity
{
  private SellInValueObject $sellIn;
  private QualityValueObject $quality;
  private string $name;

  public function __construct(
    string $name,
    int $sellIn,
    int $quality
  ) {
    $this->sellIn = new SellInValueObject($sellIn);
    $this->quality = new QualityValueObject($quality);
    $this->name = $name;
  }

  public function getSellIn(): SellInValueObject
  {
    return $this->sellIn;
  }

  public function getQuality(): QualityValueObject
  {
    return $this->quality;
  }

  public function getName(): string
  {
    return $this->name;
  }
}
