<?php


namespace App;


use App\Categories\AgedBrie;
use App\Categories\Backstage;
use App\Categories\Conjured;
use App\Categories\GenericItem;
use App\Categories\Sulfuras;

class ItemFactory
{
    private $map = [];

    private $genericItemCategoryClass;

    public function __construct()
    {
        $itemsByCategory = [
            'Aged Brie' => AgedBrie::class,
            'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
            'Backstage passes to a TAFKAL80ETC concert' => Backstage::class,
            'Conjured Mana Cake' => Conjured::class
        ];

        $this->map = $itemsByCategory;
        $this->genericItemCategoryClass = GenericItem::class;
    }

    public function getClass(string $name): string
    {
        if (!key_exists($name, $this->map)) {
            return $this->genericItemCategoryClass;
        }

        return $this->map[$name];
    }
}
