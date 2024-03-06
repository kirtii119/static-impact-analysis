<?php

namespace App;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;

/**
 * @implements Collector<Node\Expr\MethodCall>
 */
class MethodCallCollector implements Collector
{

    public function getNodeType(): string
    {
       
        return 'PhpParser\Node\Expr\MethodCall';
    }

    public function processNode(Node $node, Scope $scope): array
    {
        // var_dump($node->getLine()); //line number
        $methCall = $node->name->name; //will only work if name is an identifier, it can also be an expression
        $resolvedType = $scope->getType($node->var); //gives type of method caller
        $funcName = $scope->getFunctionName(); 

        if ($scope->isInClass()) {
            $orgClassName = $scope->getClassReflection()->getName();
            $funcName = $orgClassName . "::" . $funcName;
        }

        if ($resolvedType instanceof \PHPStan\Type\ObjectType or $resolvedType instanceof \PHPStan\Type\ThisType) {
            $methCallClassName = $resolvedType->getClassName();
        } 
        elseif ($resolvedType instanceof \PHPStan\Type\MixedType) {
            $methCallClassName = "Mixedty";            
        } elseif ($resolvedType instanceof \PHPStan\Type\IntersectionType or $resolvedType instanceof \PHPStan\Type\UnionType) {
            $methCallClassName = $resolvedType->toPhpDocNode();//this gives list of possible types 
        } elseif ($resolvedType instanceof \PHPStan\Type\StringType) {
            $methCallClassName = "str"; 
        } elseif ($resolvedType instanceof \PHPStan\Type\ObjectWithoutClassType) {
            $methCallClassName = "objwithoutclasst"; 
        } elseif ($resolvedType instanceof \PHPStan\Type\NeverType) {
            $methCallClassName = "neverty"; 
        } elseif ($resolvedType instanceof \PHPStan\Type\ResourceType) {
            $methCallClassName = "resourcety";
        } elseif ($resolvedType instanceof \PHPStan\Type\ArrayType) {
            $methCallClassName = "arraty"; 
        } elseif ($resolvedType instanceof \PHPStan\Type\NullType) {
            $methCallClassName = "nullty"; 
        } elseif ($resolvedType instanceof \PHPStan\Type\IntegerType) {
            $methCallClassName = "intty"; 
        } elseif ($resolvedType instanceof \PHPStan\Type\FloatType) {
            $methCallClassName = "floatty";
        } elseif ($resolvedType instanceof \PHPStan\Type\Constant) {
            $methCallClassName = "constantty"; 
        } elseif ($resolvedType instanceof \PHPStan\Type\BooleanType) {
            $methCallClassName = "Booleanty";
        }
          else {
            $methCallClassName = "unKnownType-".get_class($resolvedType);
            //add an exception or logger here to log the resolved type and give some methCallClassName
        }

        $methCall = $methCallClassName . "::" . $methCall;
        
		file_put_contents("./func-calls.txt", $funcName." => ".$methCall . PHP_EOL , FILE_APPEND);
        return [];

        // return [array($funcName => $methCall), $node->getLine()];


    }
}
