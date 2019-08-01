<?php


namespace App\Categories;


use App\Contracts\CanDecreaseQuality;
use App\Contracts\CanDecreaseSellIn;
use App\Item;
use App\Traits\DecreaseQuality;
use App\Traits\DecreaseSellIn;

class GenericItem extends Item implements
    CanDecreaseQuality,
    CanDecreaseSellIn
{
    use DecreaseSellIn;
    use DecreaseQuality;

    public function tick()
    {
        // Decreasing... Quality
        $this->decreaseQuality();

        // Decreasing... Sell In
        $this->decreaseSellIn();

        // Once the sell by date has passed, Quality degrades twice as fast
        if ($this->sellIn < 0) {
            $this->decreaseQuality();
        }
    }
}
