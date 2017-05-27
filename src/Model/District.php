<?php
namespace PostaKodu\Model;

class District implements \JsonSerializable
{
    protected $name;

    /**
     * @var Quarter[]
     */
    protected $quarters;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getQuarters()
    {
        return $this->quarters;
    }

    public function getLastQuarter()
    {
        return $this->quarters[count($this->quarters) - 1];
    }

    public function addQuarter($quarter)
    {
        $this->quarters[] = $quarter;
    }
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'cityName' => $this->cityName,
            'quarters' => $this->quarters
        ];
    }
}
