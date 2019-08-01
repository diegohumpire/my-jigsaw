<?php


namespace App\Items;


use App\Contracts\CanDecreaseSellIn;
use App\Contracts\CanIncreaseQuality;
use App\Item;
use App\Traits\DecreaseSellIn;
use App\Traits\IncreaseQuality;

class AgedBrie extends Item implements
    CanIncreaseQuality,
    CanDecreaseSellIn
{
    const INCREASE = 2;

    use IncreaseQuality;
    use DecreaseSellIn;

    public function tick()
    {
        if ($this->sellIn <= 0) {
            $this->increaseQuality(self::INCREASE);
        } else {
            $this->increaseQuality();
        }

        $this->decreaseSellIn();
    }
}
