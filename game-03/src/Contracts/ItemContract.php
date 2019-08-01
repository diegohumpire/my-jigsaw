<?php


namespace App\Contracts;


interface ItemContract extends
    CanDecreaseQuality,
    CanDecreaseSellIn,
    CanIncreaseQuality,
    CanIncreaseSellIn
{
    public function tick();

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param mixed $name
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getQuality();

    /**
     * @param mixed $quality
     */
    public function setQuality($quality);

    /**
     * @return mixed
     */
    public function getSellIn();

    /**
     * @param mixed $sellIn
     */
    public function setSellIn($sellIn);
}
