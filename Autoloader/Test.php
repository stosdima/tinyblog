<?php
namespace Autoloader;

class Test
{
    public $testField = 42;

    function testMethod()
    {
        echo 'It works!';
    }
}
$obj = new Test();
$obj->testMethod();