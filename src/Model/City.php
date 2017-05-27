<?php
namespace PostaKodu\Model;

class City implements \JsonSerializable
{
    protected $name;

    /**
     * @var District[]
     */
    protected $districts;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDistricts()
    {
        return $this->districts;
    }

    public function getLastDistrict()
    {
        return $this->districts[count($this->districts) - 1];
    }

    public function addDistrict($district)
    {
        $this->districts[] = $district;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'districts' => $this->districts
        ];
    }
}
