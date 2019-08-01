<?php


namespace App\Items;


use App\Item;
use App\Traits\DecreaseSellIn;
use App\Traits\IncreaseQuality;

class Backstage extends Item
{
    use IncreaseQuality;
    use DecreaseSellIn;

    const INCREASE_NEW = 1;
    const INCREASE_TWO = 2;
    const INCREASE_THREE = 3;
    const DEPRECATED_QUALITY = 0;

    public function tick()
    {
        if ($this->sellIn > 10) {
            $this->increaseQuality(self::INCREASE_NEW);
        } elseif ($this->sellIn <= 10 && $this->sellIn > 5) {
            $this->increaseQuality(self::INCREASE_TWO);
        } elseif ($this->sellIn <= 5 && $this->sellIn > 0) {
            $this->increaseQuality(self::INCREASE_THREE);
        } elseif ($this->sellIn <= 0) {
            $this->quality = self::DEPRECATED_QUALITY;
        }

        $this->decreaseSellIn();
    }
}
