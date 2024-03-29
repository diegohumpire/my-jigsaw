<?php


namespace App\Categories;


use App\Contracts\ItemContract;

class Conjured extends Category
{
    const DECREASE_QUALITY_TWICE = 2;

    public function applyTick(ItemContract $item)
    {
        // Decreasing... Quality
        $item->decreaseQuality(self::DECREASE_QUALITY_TWICE);

        // Decreasing... Sell In
        $item->decreaseSellIn();

        // Once the sell by date has passed, Quality degrades twice as fast
        if ($item->getSellIn() < 0) {
            $item->decreaseQuality(self::DECREASE_QUALITY_TWICE);
        }
    }
}
