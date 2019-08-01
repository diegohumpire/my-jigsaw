<?php


namespace App\Traits;


trait IncreaseQuality
{
    public function increaseQuality(int $increase = 1)
    {
        if ($this->quality < 50) {
            $this->quality += $increase;

            if ($this->quality > 50) {
                $this->quality = 50;
            }
        }
    }
}
