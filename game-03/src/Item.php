<?php


namespace App;


use App\Contracts\CanDecreaseQuality;
use App\Contracts\CanDecreaseSellIn;
use App\Traits\DecreaseQuality;
use App\Traits\DecreaseSellIn;

abstract class Item
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    abstract public function tick();
}
