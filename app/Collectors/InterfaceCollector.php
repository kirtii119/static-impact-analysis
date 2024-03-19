<?php
namespace App\Collectors;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;


class InterfaceCollector implements Collector
{

    public function getNodeType(): string
    {
        return 'PhpParser\Node\Stmt\Class_';
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $temp = $node->implements;
        $temp2 = $node->implements[0]->parts;
        if($temp != null){
            $className = implode("\\", $node->namespacedName->parts);
            $implements = implode("\\", $temp2);
            file_put_contents(__DIR__.'/../../run-results/InterfaceCollected.txt', $implements ." => ".$className.PHP_EOL,FILE_APPEND);

        } 
        return [];
    }
}