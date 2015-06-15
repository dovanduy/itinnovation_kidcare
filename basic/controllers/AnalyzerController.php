<?php

namespace app\controllers;

use app\models\Alert;
use Faker\Provider\tr_TR\DateTime;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AnalyzerController extends Controller
{

    public function actionIndex()
    {
        echo \Yii::app()->user->id;

        $alert = new Alert(
            date('Y-m-d G:i:s'),
            'test',
            'mail'
        );
        $alert->save();
    }


}
