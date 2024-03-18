<?php

namespace App\Collectors;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
/**
 * @implements Collector<Node\Stmt\ElseIf_, array{string, int}>
 */
class StaticMethodCallCollector implements Collector
{

    public function getNodeType(): string
    {
        
        return 'PhpParser\Node\Expr\StaticCall';
    }

    public function processNode(Node $node, Scope $scope): array
    {

        $funcName = $scope->getFunctionName(); 

        if ($scope->isInClass()) {
            $orgClassName = $scope->getClassReflection()->getName();
            $funcName = $orgClassName . "::" . $funcName;
        }else{
            $funcName= "CallOutsideClass" ;
        }
         // var_dump($node->getLine()); //line number
          $methCall = $node->name->name; //will only work if name is an identifier, it can also be an expression
         $resolvedType = $node->class->parts[0];
         if($resolvedType=="parent"){
            $resolvedType= $scope->getClassReflection()->getParentClass()->getName();
        }elseif($resolvedType == "self"){
            $resolvedType = $orgClassName;
        }else{
            
        }
        $methCall = $resolvedType. "::" .$methCall;
        

        file_put_contents(__DIR__."/../../src/call-mappings/static-calls.txt", $funcName."=>".$methCall. PHP_EOL , FILE_APPEND);

        return [];  
    }
    
}

