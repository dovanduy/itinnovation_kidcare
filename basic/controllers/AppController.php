<?php

namespace app\controllers;

use app\models\Filter;
use app\models\SettingsForm;
use app\models\User_Filterlist;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class AppController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function init()
    {
        if(Yii::$app->user->isGuest){
            $this->redirect('index.php?r=site%2Flogin');
        }
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('dashboard');
    }

    public function actionFilters()
    {
        // todo if not exists, create one
        $filterlists = User_filterlist::find(['userid' => Yii::$app->user->id])->one();

        $filters = Filter::findAll(['userid' => Yii::$app->user->id]);
        return $this->render('filters', [
            'filters' => $filters,
            'filterlists' => $filterlists
        ]);
    }

    public function actionTogglefilter($filter){
        $filterlists = User_filterlist::find(['userid' => Yii::$app->user->id])->one();
        $newValue = abs($filterlists->getAttribute($filter) - 1);
        $filterlists = User_filterlist::updateAll([$filter => $newValue], ['userid' => Yii::$app->user->id]);

        $this->redirect(['app/filters']);
    }

    public function actionCreatefilter()
    {
        $filter = new Filter();
        if (Yii::$app->request->post()) {
            $filter->setAttribute('userid', Yii::$app->user->id);
            $filter->setAttribute('keyword', Yii::$app->request->post()["Filter"]["keyword"]);
            $filter->setAttribute('alerttype', Yii::$app->request->post()["Filter"]["alerttype"]);
            $filter->save();
            $this->redirect(['app/filters']);
        }
        else{
            return $this->render('createFilter', [
                'filter' => $filter,
            ]);
        }
    }

    public function actionDeletefilter($id)
    {
        Filter::deleteAll(['id' => $id]);
        $this->redirect(['app/filters']);
    }


    public function actionRealtime()
    {
        return $this->render('realtime');
    }

    public function actionMood()
    {
        return $this->render('moodanalysis');
    }

    public function actionSettings()
    {
        $user = User::findIdentity(Yii::$app->user->id);
        $model = new SettingsForm();

        if (Yii::$app->request->post()) {
            $connection = new \yii\db\Connection([
                'dsn' => 'mysql:host=localhost;dbname=kidcare',
                'username' => 'root',
                'password' => 'banana',
            ]);
            $connection->open();
            $connection->createCommand()->update('user', [
                'firstname' => Yii::$app->request->post()['User']['firstname'],
                'lastname' => Yii::$app->request->post()['User']['lastname'],
                'childsname' => Yii::$app->request->post()['User']['childsname'],
                'email' => Yii::$app->request->post()['User']['email'],
                'phonenumber' => Yii::$app->request->post()['User']['phonenumber'],
                'email_notifications' => Yii::$app->request->post()['User']['email_notifications'],
                'phone_notifications' => Yii::$app->request->post()['User']['phone_notifications'],
            ], 'id = '.Yii::$app->user->id)->execute();
            $this->redirect(['app/settings']);
        }
        else {
            return $this->render('settings', [
                'user' => $user,
            ]);
        }
    }

}
