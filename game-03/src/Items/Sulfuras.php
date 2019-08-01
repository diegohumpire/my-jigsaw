<?php


namespace App\Items;


use App\LegendaryItem;

class Sulfuras extends LegendaryItem
{
    const QUALITY = 80;

    public function __construct($name, $quality, $sellIn)
    {
        $quality = self::QUALITY;
        parent::__construct($name, $quality, $sellIn);
    }

    public function tick()
    {
        $this->quality = self::QUALITY;
    }
}
