<?php


namespace App\Contracts;


interface CanDecreaseQuality
{
    public function decreaseQuality(int $decrease = 1);
}