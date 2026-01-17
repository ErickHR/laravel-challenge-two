<?php

declare(strict_types=1);

namespace GildedRose\Factory;

use GildedRose\Item;

use GildedRose\Strategy\AgedBrieItemUpdateStrategy;
use GildedRose\Strategy\Base\ItemUpdateStrategy;

use GildedRose\Strategy\BackstageItemUpdateStrategy;
use GildedRose\Strategy\StandardItemUpdateStrategy;
use GildedRose\Strategy\SulfurasItemUpdateStrategy;

class ItemUpdateStrategyFactory
{

  private const AGED_BRIE = 'Aged Brie';
  private const SULFURAS = 'Sulfuras, Hand of Ragnaros';
  private const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';

  private array $strategyMap = [
    self::AGED_BRIE => AgedBrieItemUpdateStrategy::class,
    self::SULFURAS => SulfurasItemUpdateStrategy::class,
    self::BACKSTAGE_PASSES => BackstageItemUpdateStrategy::class,
  ];

  public function create(Item $item): ItemUpdateStrategy
  {
    $strategyClass = $this->strategyMap[$item->name] ?? StandardItemUpdateStrategy::class;
    return new $strategyClass($item);
  }
}
