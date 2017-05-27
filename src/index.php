<?php
require_once 'vendor/autoload.php';

/*
# http://postakodu.ptt.gov.tr/Dosyalar/pk_list.zip
use PostaKodu\Controller\JsonCreator;

$jsonCreator = new JsonCreator();
*/

class index
{
    public $directory = 'Data';

    public function run()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        $filename = $this->directory . '/' . $url . '.json';

        if (file_exists($filename)) {
            header("Content-type: application/json; charset=utf-8");
            echo file_get_contents($filename);
        } else {
            $this->printUsage();
        }
    }

    public function printUsage()
    {
        echo '<html><head><title>PostKodu MicroService</title></head>
        <body>
            <p>Usage:</br><strong><a href="http://localhost/61">http://localhost/61</a></strong></p>
            <p>Where
                <ul>
                    <li><strong>http</strong> is the protocol of your current Web Server.</li>
                    <li><strong>localhost</strong> is the address of your current Web Server.</li>
                    <li><strong>61</strong> is the Province Id your are searching for.
                        <ul><li>In this case <strong>61</strong> stands for Trabzon.</liIn></ul>
                    </li>
                </ul>
        </body></html>';
    }

}

$index = new index();
$index->run();
