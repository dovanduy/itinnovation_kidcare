<?php
require('../../_bootstrap.php');
use \app\models\Analyzer;
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
        $analyzer = new Analyzer();
        $this->assertEquals(2, sizeof($analyzer->pullItems()));
    }

    public function testSplitCharacterStream1(){
        $analyzer = new Analyzer();
        $words = $analyzer->splitCharacterStream('this');
        $this->assertEquals(1, sizeof($words));
    }

    public function testSplitCharacterStream2(){
        $analyzer = new Analyzer();
        $words = $analyzer->splitCharacterStream('this is nothing');
        $this->assertEquals(3, sizeof($words));
    }

    public function testSplitCharacterStream3(){
        $analyzer = new Analyzer();
        $words = $analyzer->splitCharacterStream('this is a test stream');
        $this->assertEquals(5, sizeof($words));
    }

    public function testSplitCharacterStream4(){
        $analyzer = new Analyzer();
        $words = $analyzer->splitCharacterStream('crtl+f');
        $this->assertEquals(1, sizeof($words));
    }

    public function testSplitCharacterStream5(){
        $analyzer = new Analyzer();
        $words = $analyzer->splitCharacterStream('crtl+f aap ctrl+f4');
        $this->assertEquals(3, sizeof($words));
    }

    public function testCheckFilter(){
        $user = new User();
        $user->id = 1;
        $analyzer = new Analyzer();
        $this->assertTrue($this->user, $analyzer->checkFilter('cow'));
    }

    public function testCheckFilter2(){
        $user = new User();
        $user->id = 1;
        $analyzer = new Analyzer();
        $this->assertFalse($user, $analyzer->checkFilter('cows'));
    }

}
?>