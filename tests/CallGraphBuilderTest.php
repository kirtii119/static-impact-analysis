<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require_once("src/CallGraphBuilder.php");

final class CallGraphBuilderTest extends TestCase
{
    public function testrun(): void
    {
        $testFuncMap = ["func1"=>["func1a", "func2"], "func2" => ["func2a", "func1", "func2"], "func3" => ["func3a"] ]; 
        $callGraphBuilder = new CallGraphBuilder($testFuncMap);
        $callGraphResult = $callGraphBuilder->run("func1", CallGraphBuilder::LINEAR);
        
        $this->assertSame(['func1','func1a', 'func2', 'func2a'], $callGraphResult);
    }
}


//check normal
//check not stuck in recursion due to recursion in the test case
//check if 1 function is included in the result only once
//check intersection Type example