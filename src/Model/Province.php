<?php
namespace PostaKodu\Model;

class Province implements \JsonSerializable
{

    protected $id;

    protected $name;

    /**
     * @var City[]
     */
    protected $cities = [];

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCities()
    {
        return $this->cities;
    }

    public function getLastCity()
    {
        return $this->cities[count($this->cities) - 1];
    }

    public function addCity($city)
    {
        $this->cities[] = $city;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cities' => $this->cities
        ];
    }
}
