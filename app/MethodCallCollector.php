<?php

namespace App;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;

/**
 * @implements Collector<Node\Stmt\ElseIf_, array{string, int}>
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
        // if($resolvedType instanceof \PHPStan\Type\ObjectType or $resolvedType instanceof \PHPStan\Type\ThisType  ){
        //     $methCallClassName =  $resolvedType->getClassName(); //getClassName works only for object types
        // }

        if ($resolvedType instanceof \PHPStan\Type\ObjectType or $resolvedType instanceof \PHPStan\Type\ThisType) {
            $methCallClassName = $resolvedType->getClassName(); //getClassName works only for object types
        } elseif ($resolvedType instanceof \PHPStan\Type\MixedType) {
            $methCallClassName = "Mixedty";            //getClassName works only for object types
        } elseif ($resolvedType instanceof \PHPStan\Type\IntersectionType or $resolvedType instanceof \PHPStan\Type\UnionType) {
            $methCallClassName = $resolvedType->toPhpDocNode();//this gives list of possible types 
        } elseif ($resolvedType instanceof \PHPStan\Type\StringType) {
            $methCallClassName = "str"; //getClassName works only for object types
        } elseif ($resolvedType instanceof \PHPStan\Type\ObjectWithoutClassType) {
            $methCallClassName = "objwithoutclasst"; //getClassName works only for object types
        } elseif ($resolvedType instanceof \PHPStan\Type\NeverType) {
            $methCallClassName = "neverty"; //getClassName works only for object types
        } elseif ($resolvedType instanceof \PHPStan\Type\ResourceType) {
            $methCallClassName = "resourcety"; //getClassName works only for object types
        } elseif ($resolvedType instanceof \PHPStan\Type\ArrayType) {
            $methCallClassName = "arraty"; //getClassName works only for object types
        } elseif ($resolvedType instanceof \PHPStan\Type\NullType) {
            $methCallClassName = "nullty"; //getClassName works only for object types
        } elseif ($resolvedType instanceof \PHPStan\Type\IntegerType) {
            $methCallClassName = "intty"; //getClassName works only for object types
        } elseif ($resolvedType instanceof \PHPStan\Type\FloatType) {
            $methCallClassName = "floatty"; //getClassName works only for object types
        }else {
            $methCallClassName = $resolvedType->getClassName();
        }

        $methCall = $methCallClassName . "::" . $methCall;

        return [array($funcName => $methCall), $node->getLine()];

    }
}

