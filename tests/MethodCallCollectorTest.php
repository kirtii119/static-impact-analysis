<?php

namespace App\Tests;
use PHPUnit\Framework\TestCase;
class MethodCallCollectorTest extends TestCase
{

    protected $meth_call_map = __DIR__."/../call-mappings/meth-calls.txt";

    protected function runFirst($filename) :void {
        file_put_contents($this->meth_call_map, "");
        exec(__DIR__."/../phpstan-src/bin/phpstan clear-result-cache ");
        exec(__DIR__."/../phpstan-src/bin/phpstan  analyse tests/testCases/".$filename.".php");
    }


    public function testObjectType()
    {       
        $this->runFirst('ObjectTestCase');
        $expectedOutput = "Tester::doSomethingUseful => TestClass::testme\n";
        $this->assertStringEqualsFile($this->meth_call_map, $expectedOutput);
    }

    public function testThisType(){
        $this->runFirst('ThisTestCase');
        $expectedOutput = "Tester::doSomethingUseful => Tester::testme\n";
        $this->assertStringEqualsFile($this->meth_call_map, $expectedOutput);
        
    }

    public function testUnionType(){
        $this->runFirst('UnionTestCase');
        $expectedOutput = "Tester::doSomethingUseful => (TestClassOne | TestClassTwo)::testme\n";
        $this->assertStringEqualsFile($this->meth_call_map, $expectedOutput);
        
    }


    public function testIntersectionType(){
        $this->runFirst('IntersectionTestCase');
        $expectedOutput = "Tester::doSomethingUseful => (TestClass & TestInterface)::classMethod\n";
        $this->assertStringEqualsFile($this->meth_call_map, $expectedOutput);
        
    }


}
