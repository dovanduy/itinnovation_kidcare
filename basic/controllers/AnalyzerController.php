<?php
namespace app\controllers;
use app\models\Alert;
use app\models\User;
use Faker\Provider\tr_TR\DateTime;
use Yii;
use yii\filters\AccessControl;
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

    public function actionIndex()
    {
        echo 'Analyzing..';
    }

    /**
     * Creating alerts for log items
     */
    public function processLogItems(){

        // pull items from server

        // process log item

        // run sentiment analysis

        // generate alert
        $alert = new Alert(
            date('Y-m-d G:i:s'),
            'test',
            'mail'
        );
        $alert->save();
    }

    /**
     * Create alert to user on keyword found in log item
     */
    private function createAlert($timestamp, $keyword){

    }
}
