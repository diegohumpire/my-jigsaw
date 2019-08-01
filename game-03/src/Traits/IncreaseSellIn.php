<?php


namespace App\Traits;


trait IncreaseSellIn
{
    public function increaseSellIn()
    {
        $this->sellIn += 1;
    }
}