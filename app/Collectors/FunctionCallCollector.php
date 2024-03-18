<?php

namespace App\Collectors;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
/**
 * @implements Collector<Node\Stmt\ElseIf_, array{string, int}>
 */
class FunctionCallCollector implements Collector
{

    public function getNodeType(): string
    {
        
        return 'PhpParser\Node\Expr\FuncCall';
    }

    public function processNode(Node $node, Scope $scope): array
    {

     //   $filename = $scope->getFileDescription() ;
        $funcName = $scope->getFunctionName(); 


        
     //   var_dump($filename);
        if ($scope->isInClass()) {
            $orgClassName = $scope->getClassReflection()->getName();
            $funcName = $orgClassName . "::" . $funcName;
        }else{
            $funcName= "CallOutsideClass" ;
        }


        $methCall = $node->name->parts[0]; 
      //  var_dump($methCall);

        file_put_contents(__DIR__."/../../src/call-mappings/func-calls.txt", $funcName."=>"."$methCall". PHP_EOL , FILE_APPEND);


      //  var_dump($funcName);

        return [];
    }
    
}

