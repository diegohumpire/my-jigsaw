<?php


namespace App;


use App\Items\AgedBrie;
use App\Items\Backstage;
use App\Items\Conjured;
use App\Items\GenericItem;
use App\Items\Sulfuras;

class ItemMapper
{
    private $map = [];

    private $genericItemClass;

    public function __construct()
    {
        $customItems = [
            'Aged Brie' => AgedBrie::class,
            'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
            'Backstage passes to a TAFKAL80ETC concert' => Backstage::class,
            'Conjured Mana Cake' => Conjured::class
        ];

        $this->map = $customItems;

        $this->genericItemClass = GenericItem::class;
    }

    public function getClass(string $name): string
    {
        if (!key_exists($name, $this->map)) {
            return $this->genericItemClass;
        }

        return $this->map[$name];
    }
}
