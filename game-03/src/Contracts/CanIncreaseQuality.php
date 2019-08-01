<?php


namespace App\Contracts;


interface CanIncreaseQuality
{
    public function increaseQuality(int $increase = 1);
}