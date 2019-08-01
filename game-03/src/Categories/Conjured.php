<?php


namespace App\Categories;


use App\Contracts\CanDecreaseQuality;
use App\Contracts\CanDecreaseSellIn;
use App\Item;
use App\Traits\DecreaseQuality;
use App\Traits\DecreaseSellIn;

class Conjured extends Item implements
    CanDecreaseSellIn,
    CanDecreaseQuality
{
    use DecreaseQuality, DecreaseSellIn;

    const DECREASE_QUALITY_TWICE = 2;

    public function tick()
    {
        // Decreasing... Quality
        $this->decreaseQuality(self::DECREASE_QUALITY_TWICE);

        // Decreasing... Sell In
        $this->decreaseSellIn();

        // Once the sell by date has passed, Quality degrades twice as fast
        if ($this->sellIn < 0) {
            $this->decreaseQuality(self::DECREASE_QUALITY_TWICE);
        }
    }
}
