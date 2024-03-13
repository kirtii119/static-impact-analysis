<?php

namespace App;

use PhpParser\{Node, NodeFinder};
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;

/**
 * @implements Collector<Node\Stmt\Class_, array{}>
 */
class ClassDependencyCollector implements Collector
{

    public function getNodeType(): string
    {
        return 'PhpParser\Node\Stmt\Class_';
    }

    public function processNode(Node $node, Scope $scope): array
    {
       $name = $scope->getNamespace()."\\".$node->name->name;
       echo $name;
       echo "\n";

       $nodeFinder = new NodeFinder;
       $constructorNode = $nodeFinder->find($node, function(Node $findNode) {
        return $findNode instanceof Node\Stmt\ClassMethod
            && $findNode->name->name == "__construct";
    });

        $paramLength = 0;

        if($constructorNode){
            $paramLength = count($constructorNode[0]->params);
        }

        $filename = "./class-dependencies/class-cons-params-".$paramLength.".txt";

        file_put_contents($filename, $name. PHP_EOL , FILE_APPEND);
        return [];
    }
}

