<?php
namespace PostaKodu\Data;

class CSVData
{
    protected $province;
    protected $city;
    protected $district;
    protected $quarter;
    protected $zip;

    /**
     * CSVData constructor.
     * @param string $province
     * @param string $city
     * @param string $district
     * @param string $quarter
     * @param string $zip
     */
    public function __construct($province, $city, $district, $quarter, $zip)
    {
        $this->province = trim($province);
        $this->city = trim(city);
        $this->district = trim($district);
        $this->quarter = trim($quarter);
        $this->zip = trim($zip);
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * @return string
     */
    public function getQuarter(): string
    {
        return $this->quarter;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @return int
     */
    public function getProvinceId(): int
    {
        $id = substr($this->zip, 0, 2);

        if (substr($id, 0, 1) == '0') {
            return (int) substr($id, 1, 1);
        }

        return (int) $id;
    }

}
