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
        $funcName = $node->name->name; //will only work if name is an identifier, it can also be an expression

        $resolvedType = $scope->getType($node->var);
        // if($resolvedType instanceof \PHPStan\Type\ObjectType or $resolvedType instanceof \PHPStan\Type\ThisType  ){
        //     $className =  $resolvedType->getClassName(); //getClassName works only for object types
        // }
        if($resolvedType instanceof \PHPStan\Type\MixedType){
            $className =  "idontknow"; //getClassName works only for object types
        }
        elseif($resolvedType instanceof \PHPStan\Type\IntersectionType){
            $className =  "idontknow"; //getClassName works only for object types
        }
        elseif($resolvedType instanceof \PHPStan\Type\UnionType){
            $className =  "idontknow"; //getClassName works only for object types
        }
        elseif($resolvedType instanceof \PHPStan\Type\StringType){
            $className =  "idontknow"; //getClassName works only for object types
        }
        elseif($resolvedType instanceof \PHPStan\Type\ObjectWithoutClassType){
            $className =  "idontknow"; //getClassName works only for object types
        }
        elseif($resolvedType instanceof \PHPStan\Type\NeverType){
            $className =  "idontknow"; //getClassName works only for object types
        }
        elseif($resolvedType instanceof \PHPStan\Type\ResourceType){
            $className =  "idontknow"; //getClassName works only for object types
        }
        elseif($resolvedType instanceof \PHPStan\Type\ArrayType){
            $className =  "idontknow"; //getClassName works only for object types
        }
        else{
            $className =  $resolvedType->getClassName();
        }
        

        // else{
        //     $className = "idontknow";
        // }

        
        // echo "$className :: $funcName";
       
        
        return ["$className :: $funcName", $node->getLine()];

	}
}

