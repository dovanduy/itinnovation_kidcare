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

    public $items = ['one','two','three'];

    /**
     * Pulls items from the external server
     */
    public function pullItems(){
        return $this->items;
    }

    /**
     * Splits the characters from the logitems into words
     */
    private function splitCharacterStream(){    }

    /**
     * @param Check if on a word a filter is applied
     */
    private function checkFilter($word){   }

}