<?php


namespace App\Categories;


use App\Contracts\ItemContract;

abstract class Category
{
    abstract public function applyTick(ItemContract $item);
}
