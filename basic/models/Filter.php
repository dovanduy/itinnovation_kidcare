<?php
/**
 * Created by IntelliJ IDEA.
 * User: Dennis Eikelenboom
 * Date: 15-6-2015
 * Time: 14:08
 */
namespace app\models;

use yii\db\ActiveRecord;

class Filter extends ActiveRecord{

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'alerttype' => 'Alert type'
        ];
    }

}