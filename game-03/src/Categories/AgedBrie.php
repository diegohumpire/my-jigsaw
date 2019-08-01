<?php


namespace App\Categories;


use App\Contracts\ItemContract;

class AgedBrie extends Category
{
    const INCREASE = 2;

    public function applyTick(ItemContract $item)
    {
        if ($item->getSellIn() <= 0) {
            $item->increaseQuality(self::INCREASE);
        } else {
            $item->increaseQuality();
        }

        $item->decreaseSellIn();
    }
}
