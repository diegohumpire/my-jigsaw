<?php


namespace App\Traits;


trait DecreaseQuality
{
    public function decreaseQuality(int $decrease = 1)
    {
        if ($this->quality > 0) {
            $this->quality -= $decrease;

            if ($this->quality < 0) {
                $this->quality = 0;
            }
        }
    }
}
