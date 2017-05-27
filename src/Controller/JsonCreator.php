<?php
/**
 * Created by PhpStorm.
 * User: alat
 * Date: 26.05.17
 * Time: 23:49
 */

namespace PostaKodu\Controller;

use PostaKodu\Data\CSVData;
use PostaKodu\Model\City;
use PostaKodu\Model\District;
use PostaKodu\Model\Province;
use PostaKodu\Model\Quarter;

class JsonCreator
{

    public $directory = 'Data';
    public $csvFilename = 'postakodlari.csv';

    /**
     * @var Province
     */
    protected $currentProvince;

    public function __construct()
    {
        $this->createJson();
    }

    public function createJson()
    {
        if (($handle = fopen($this->directory . '/' . $this->csvFilename, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $csvData = $this->getCSVData($data);
                $this->readCSV($csvData);
            }
            fclose($handle);
        }
    }

    protected function getCSVData($data)
    {
        return new CSVData($data[0] ,$data[1], $data[2] ,$data[3], $data[4]);
    }

    /**
     * @param CSVData $csvData
     */
    public function readCSV($csvData)
    {
        if($csvData->getZip() == 'PK') {
            return;
        }

        $id = $csvData->getProvinceId();

        if(null == $this->currentProvince || $this->currentProvince->getId() != $id ) {
            if (null !== $this->currentProvince) {
                $this->persistProvince();
            }
            $this->currentProvince = new Province($id, $csvData->getProvince());
        } else if (
            empty($this->currentProvince->getCities())
            || $this->currentProvince->getLastCity()->getName() !== $csvData->getCity()
        ) {
            $city = new City($csvData->getCity());
            $this->currentProvince->addCity($city);
        } else if (
            empty($this->currentProvince->getLastCity()->getDistricts())
            || $this->currentProvince->getLastCity()->getLastDistrict()->getName() !== $csvData->getDistrict()
        ) {
            $district = new District($csvData->getDistrict());
            $this->currentProvince->getLastCity()->addDistrict($district);
        } else if (
            empty($this->currentProvince->getLastCity()->getLastDistrict()->getQuarters())
            || $this->currentProvince->getLastCity()->getLastDistrict()->getLastQuarter()->getName() !== $csvData->getQuarter()
        ) {
            $quarter = new Quarter($csvData->getQuarter(), $csvData->getZip());
            $this->currentProvince->getLastCity()->getLastDistrict()->addQuarter($quarter);
        }
    }

    protected function persistProvince()
    {
        $filename = $this->directory . '/' . $this->currentProvince->getId() . '.json';
        if (file_exists($filename)) {
            echo '<p>' .$filename .' exists</p>';
            return true;
        }

        if (($fp = fopen($filename, 'w')) !== false) {
            fwrite($fp, json_encode($this->currentProvince, JSON_UNESCAPED_UNICODE));
            fclose($fp);
            echo '<p>' .$filename .' persisted</p>';
        } else {
            return false;
        }

        return true;
    }
}
