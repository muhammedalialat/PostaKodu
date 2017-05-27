<?php
require_once 'vendor/autoload.php';

/*
# http://postakodu.ptt.gov.tr/Dosyalar/pk_list.zip
use PostaKodu\Controller\JsonCreator;

$jsonCreator = new JsonCreator();
*/

class index {
    public $directory = 'Data';

    public function run() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $urlParameters = explode('/', $url);

        $filename = $this->directory . '/' . $url . '.json';

        header("Content-type: application/json; charset=utf-8");

        if (file_exists($filename)) {
            echo file_get_contents($filename);
        }


#        echo json_encode($cities[$urlParameters[0]-1], JSON_PRETTY_PRINT);
    }
}

$index = new index();
$index->run();
