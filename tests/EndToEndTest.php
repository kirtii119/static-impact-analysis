<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require __DIR__.'../../src/CallGraphSearch.php';

final class EndToEndTest extends TestCase
{
    protected $meth_call_map = __DIR__."/../call-mappings/meth-calls.txt";
    
    protected function runFirst($filename) :void {
        file_put_contents($this->meth_call_map, "");
        exec(__DIR__."/../phpstan-src/bin/phpstan clear-result-cache ");
        exec(__DIR__."/../phpstan-src/bin/phpstan  analyse tests/testCases/".$filename.".php");
    }


    public function testInterfaceTypes(): void
    {

        $this->runFirst('InterfaceTestCase');
        file_put_contents(__DIR__.'/../src/controller-url-map.txt',PHP_EOL.'Tester::execute=>testurl' ,FILE_APPEND);

        exec("php index.php 'TesttClass::classMethod'", $output);
        
        //cleanup code
        $lines = file(__DIR__.'/../src/controller-url-map.txt', FILE_IGNORE_NEW_LINES);
        array_pop($lines);
        file_put_contents(__DIR__.'/../src/controller-url-map.txt', join(PHP_EOL,$lines));
        exec("rm -rf 'src/call-graphs/Tester::execute.txt'");

        $expectedOutput = ["Array", "(", "    [0] => testurl",")"];
        $this->assertEquals($output, $expectedOutput);
    }

    //Consider di.xml here
    public function testPlugin(): void
    {

        $this->runFirst('PluginTestCase');
        file_put_contents(__DIR__.'/../src/controller-url-map.txt',PHP_EOL.'PTestClass::execute=>testurl' ,FILE_APPEND);
        

        exec("php index.php 'UpdatePTestClass::beforePTestMethod'", $output);

        //cleanup code
        $lines = file(__DIR__.'/../src/controller-url-map.txt', FILE_IGNORE_NEW_LINES);
        array_pop($lines);
        file_put_contents(__DIR__.'/../src/controller-url-map.txt', join(PHP_EOL,$lines));
        exec("rm -rf 'src/call-graphs/PTestClass::execute.txt'");


        $expectedOutput = ["Array", "(", "    [0] => testurl",")"];
        
        $this->assertEquals($output, $expectedOutput);
    }

    //Consider di.xml here
    public function testInterfaceDI(): void
    {

        $this->runFirst('InterfaceTestCaseUsingDI');
        file_put_contents(__DIR__.'/../src/controller-url-map.txt',PHP_EOL.'TestClass::execute=>testurl' ,FILE_APPEND);

        exec("php index.php 'SpecialClass::classMethod'", $output);

        //cleanup code
        $lines = file(__DIR__.'/../src/controller-url-map.txt', FILE_IGNORE_NEW_LINES);
        array_pop($lines);
        file_put_contents(__DIR__.'/../src/controller-url-map.txt', join(PHP_EOL,$lines));
        exec("rm -rf 'src/call-graphs/TestClass::execute.txt'");


        $expectedOutput = ["Array", "(", "    [0] => testurl",")"];
        
        $this->assertEquals($output, $expectedOutput);
    }

}