<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Registration form is the form behind the registration form
 */
class RegistrationForm extends Model
{
    public $deviceId;
    public $username;
    public $password;
    public $passwordConfirm;
    public $rememberMe = true;
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['deviceId', 'username', 'password','passwordConfirm'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if ($this->password != $this->passwordConfirm) {
            $this->addError($attribute, 'The passwords filled in do not match.');
        }
    }

    /**
     * Creates a new account
     * @return boolean whether the user is logged in successfully
     */
    public function register()
    {
        $user = new User();
        $user->setDeviceId($this->deviceId);
        $user->setUsername($this->username);
        $user->setPassword($this->password);
        $user->save();
        return true;
    }

}
