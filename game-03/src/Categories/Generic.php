<?php


namespace App\Categories;


use App\Contracts\ItemContract;

class Generic extends Category
{
    public function applyTick(ItemContract $item)
    {
        // Decreasing... Quality
        $item->decreaseQuality();

        // Decreasing... Sell In
        $item->decreaseSellIn();

        // Once the sell by date has passed, Quality degrades twice as fast
        if ($item->getSellIn() < 0) {
            $item->decreaseQuality();
        }
    }
}
