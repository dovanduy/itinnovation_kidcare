<?php
require('../../_bootstrap.php');
/**
 * Created by IntelliJ IDEA.
 * User: Dennis Eikelenboom
 * Date: 16-6-2015
 * Time: 16:10
 */

class AnalyzerTest extends PHPUnit_Framework_TestCase
{

    public function testPulling()
    {
        $analyzer = new \app\models\Analyzer();
        $this->assertEquals(sizeof($analyzer->pullItems()), 3);
    }

}
?>