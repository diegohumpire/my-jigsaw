<?php


namespace App\Traits;


trait DecreaseSellIn
{
    public function decreaseSellIn()
    {
        $this->sellIn -= 1;
    }
}
