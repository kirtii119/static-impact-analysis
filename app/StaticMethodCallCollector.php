<?php

namespace App;

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
         // var_dump($node->getLine()); //line number
         $methCall = $node->name->name; //will only work if name is an identifier, it can also be an expression
         $resolvedType = $scope->class->parts[0]; //gives type of method caller
         $orgfuncName = $scope->getFunctionName();

         print_r($scope -> getParentScope()->getType($node->class));
 
         if ($scope->isInClass()) {
             $orgClassName = $scope->getClassReflection()->getName();
             $orgfuncName = $orgClassName . "::" . $orgfuncName;
         }

         return [];  
    }
    
}

