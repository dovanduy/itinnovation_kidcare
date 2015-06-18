<?php
namespace app\controllers;
use app\models\AES128;
use app\models\Alert;
use app\models\Filter;
use app\models\Analyzer;
use app\models\LogItem;
use app\models\User;
use Faker\Provider\tr_TR\DateTime;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\base\Security;

/**
 * This controller takes care of synchronization with the log server,
 * as well as the processing of data and generation of alerts.
 * @package app\controllers
 *
 * @author Dennis Eikelenboom
 */
class SynchronizerController extends Controller
{

    private $server = 'http://denniseik.nl/ictinnovation/';

    public function actionIndex($log = false)
    {
        $items = $this->retrieveItems();
        $this->storeItemsLocally($items);
        //$this->deleteServerItems();
    }

    public function storeItemsLocally($items){
        //open database connection
        $connection = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=kidcare',
            'username' => 'root',
            'password' => 'banana',
        ]);
        $connection->open();

        // and store all new log items
        foreach($items as $item) {
            $command = $connection->createCommand("
              INSERT IGNORE INTO log_item
              VALUES ('" . $item['timestamp'] . "', '" . $item['characters'] . "', '" . $item['deviceid'] . "','0')
            ")->execute();
        }
    }

    public function deleteServerItems(){
        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL, $this->server.'delete.php');
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);
    }

    public function retrieveItems(){
        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL, $this->server.'retrieve.php');
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        // Will dump a beauty json :3
        return json_decode($result, true);
    }

}
