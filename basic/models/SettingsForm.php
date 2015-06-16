<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SettingsForm extends Model
{
    public $deviceid;
    public $firstname;
    public $lastname;
    public $childsname;
    public $email;
    public $phonenumber;
    public $email_notifications;
    public $phone_notifications;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['deviceid', 'firstname', 'lastname', 'childsname', 'email'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'deviceId' => 'Device ID',
            'phonenumber' => 'Phone number (incl. country code)',
            'email' => 'Email address',
            'phone_notifications' => 'Receive email notifications',
            'email_notifications' => 'Receive phone notifications',
            'childsname' => 'Child\'s name'
        ];
    }

}
