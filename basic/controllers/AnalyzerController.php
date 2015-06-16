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

class AnalyzerController extends Controller
{

    public function actionIndex()
    {
        //echo User::findIdentity(\Yii::$app->user->id)->getAttribute('email');

        $alert = new Alert(
            date('Y-m-d G:i:s'),
            'test',
            'mail'
        );
        $alert->save();
    }


}
