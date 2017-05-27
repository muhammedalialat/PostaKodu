<?php
namespace PostaKodu\Model;

class Quarter implements \JsonSerializable
{
    protected $name;

    protected $zip;

    public function __construct($name, $zip)
    {
        $this->name = $name;
        $this->zip = $zip;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'zip' => $this->zip
        ];
    }
}
