<?php


namespace App;


use App\Contracts\ItemContract;
use App\Traits\DecreaseQuality;
use App\Traits\DecreaseSellIn;
use App\Traits\IncreaseQuality;
use App\Traits\IncreaseSellIn;

final class Item implements
    ItemContract
{
    use DecreaseSellIn, DecreaseQuality, IncreaseQuality, IncreaseSellIn;

    public $name;

    public $quality;

    public $sellIn;

    public $categoryFactory;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
        $this->categoryFactory = new CategoryFactory();
    }

    public function tick()
    {
        // Is in map: Return specific Item
        // Is not in map: Return Generic Item
        $category = $this->categoryFactory->getCategoryInstance($this->name);
        $category->applyTick($this);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getQuality()
    {
        return (int) $this->quality;
    }

    /**
     * @param mixed $quality
     */
    public function setQuality($quality)
    {
        $this->quality = (int) $quality;
    }

    /**
     * @return mixed
     */
    public function getSellIn()
    {
        return (int) $this->sellIn;
    }

    /**
     * @param mixed $sellIn
     */
    public function setSellIn($sellIn)
    {
        $this->sellIn = (int) $sellIn;
    }
}
