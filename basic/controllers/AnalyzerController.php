<?php
namespace app\controllers;
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

/**
 * This controller takes care of synchronization with the log server,
 * as well as the processing of data and generation of alerts.
 * @package app\controllers
 *
 * @author Dennis Eikelenboom
 */
class AnalyzerController extends Controller
{

    public function actionIndex($log = false)
    {
        $items = $this->processLogItems();
        if($log){
            echo $items;
        }
    }

    /**
     * Creating alerts for log items
     */
    public function processLogItems()
    {
        // pull new items from server
        $items = LogItem::findAll([
            'deviceid' => User::findIdentity(Yii::$app->user->id)->getAttribute('deviceid'),
            'processed' => 0
        ]);

        // and process each log item, printing its textual content
        foreach ($items as $item) {
            $this->analyze($item);

            // flag as processed
            $item->setAttribute('processed',1);
            $item->save();
        }

        return Json::encode($items);

    }

    /**
     * Analyze item and return characters
     * @param $item
     * @return mixed
     */
    public function analyze($item){

        // analyze each word written
        $words = Analyzer::splitCharacterStream($item->getAttribute('characters'));
        foreach($words as $word){
            // if a filter is applied, send alerts
            if (Analyzer::checkFilter(Yii::$app->user, $word)){
                $this->createAlert($item->getAttribute('timestamp'), $word);
            }
        }

        return $item->getAttribute('characters');

    }

    /**
     * Create alert to user on keyword found in log item
     */
    private function createAlert($timestamp, $keyword){
        $alert = new Alert();
        $alert->setAttribute('timestamp', $timestamp);
        $alert->setAttribute('message',   'You child typed '.$keyword);
        $alert->setAttribute('alertType', 'mail'); //todo according to user settings
        $alert->setAttribute('userid', Yii::$app->user->id);

        $alert->sendNotifications();
        $alert->save();
    }
}
