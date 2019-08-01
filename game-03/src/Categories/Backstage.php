<?php


namespace App\Categories;


use App\Contracts\ItemContract;

class Backstage extends Category
{
    const INCREASE_NEW = 1;
    const INCREASE_TWO = 2;
    const INCREASE_THREE = 3;
    const DEPRECATED_QUALITY = 0;

    public function applyTick(ItemContract $item)
    {
        if ($item->getSellIn() > 10) {
            $item->increaseQuality(self::INCREASE_NEW);
        } elseif ($item->getSellIn() <= 10 && $item->getSellIn() > 5) {
            $item->increaseQuality(self::INCREASE_TWO);
        } elseif ($item->getSellIn() <= 5 && $item->getSellIn() > 0) {
            $item->increaseQuality(self::INCREASE_THREE);
        } elseif ($item->getSellIn() <= 0) {
            $item->setQuality(self::DEPRECATED_QUALITY);
        }

        $item->decreaseSellIn();
    }
}
