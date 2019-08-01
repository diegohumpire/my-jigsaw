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
        // Is in map: Return specific Item
        // Is not in map: Return Generic Item
        $class = (new ItemMapper())->getClass($name);

        return new $class($name, $quality, $sellIn);
    }
}
