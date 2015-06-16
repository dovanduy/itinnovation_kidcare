<?php
namespace app\models;

use yii\db\ActiveRecord;

class Alert extends ActiveRecord{

    public $id;
    public $message;
    public $alertType;

    public function __construct($timestamp, $message, $alertType)
    {
        $this->setAttribute('timestamp', $timestamp);
        $this->setAttribute('message', 'blabla');
        $this->setAttribute('alertType', $alertType);

        $this->sendNotifications();

        parent::__construct();
    }

    public function sendNotifications(){

        if($this->getAttribute('alertType') == 'mail'){
            $this->notifyByEmail();
        }
        elseif($this->getAttribute('alertType') == 'phone'){
            echo 'notify by phone';
        }
        elseif($this->getAttribute('alertType') == 'mail+phone'){
            echo 'notify by email + phone';
        }
    }

    /**
     * send an email to user's email adress
     */
    public function notifyByEmail(){
        \Yii::$app->mailer->compose()
            ->setFrom('mail@denniseik.nl')
            ->setTo(User::findIdentity(\Yii::$app->user->id)->getAttribute('email'))
            ->setSubject('test message')
            ->setTextBody($this->getAttribute('message'))
            ->send();
    }

    public function notifyByPhone(){
    }


}