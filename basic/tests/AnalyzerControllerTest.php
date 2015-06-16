<?php
/**
 * Created by IntelliJ IDEA.
 * User: Dennis Eikelenboom
 * Date: 16-6-2015
 * Time: 16:10
 */

class AnalyzerControllerTest extends PHPUnit_Framework_TestCase
{
    public function testPushAndPop()
    {
        $stack = array();
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
}
?>