<?php


namespace App;


use App\Categories\AgedBrie;
use App\Categories\Backstage;
use App\Categories\Category;
use App\Categories\Conjured;
use App\Categories\Generic;
use App\Categories\Legendary;

class CategoryFactory
{
    private $map = [];

    private $genericItemCategoryClass;

    public function __construct()
    {
        /*
         * Map
         * -----------------
         * Read like:
         * Item => Category
         */
        $itemsByCategory = [
            'Aged Brie' => AgedBrie::class,
            'Sulfuras, Hand of Ragnaros' => Legendary::class,
            'Backstage passes to a TAFKAL80ETC concert' => Backstage::class,
            'Conjured Mana Cake' => Conjured::class
        ];

        $this->map = $itemsByCategory;
        $this->genericItemCategoryClass = Generic::class;
    }

    public function getCategoryInstance(string $name): Category
    {
        if (!key_exists($name, $this->map)) {
            return new $this->genericItemCategoryClass();
        }

        return new $this->map[$name]();
    }
}
