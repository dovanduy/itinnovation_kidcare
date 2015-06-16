<?php
/**
 * Created by IntelliJ IDEA.
 * User: Dennis Eikelenboom
 * Date: 16-6-2015
 * Time: 16:31
 */
namespace app\models;

use yii\base\Model;

class Analyzer extends Model{

    public $items = [
        ['timestamp' => '1', 'text' => 'een twee drie', 'deviceid'  => 'ert789', 'processed' => 0],
        ['timestamp' => '2', 'text' => 'een twee drie', 'deviceid'  => 'ert789', 'processed' => 0]
    ];

    /**
     * Pulls items from the external server
     */
    public function pullItems(){
        return $this->items;
    }

    /**
     * Splits the characters from the logitems into words
     */
    public function splitCharacterStream($characterstream){
        return explode(" ", $characterstream);
    }

    /**
     * @param Check if on a word a filter is applied
     */
    public function checkFilter($user, $word){
        return Filter::find()->where(['userid' => $user->id, 'keyword' => $word])->exists();
    }

}