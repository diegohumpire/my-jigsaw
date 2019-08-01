<?php

namespace App;

class GildedRose
{
    /**
     * @param $name
     * @param $quality
     * @param $sellIn
     * @return Item
     */
    public static function of($name, $quality, $sellIn): Item
    {
        return new Item($name, $quality, $sellIn);
    }
}
