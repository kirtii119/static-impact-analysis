<?php

namespace App\Collectors;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;

/**
 * @implements Collector<Node\Stmt\ElseIf_, array{string, int}>
 */
class MeraCollector implements Collector
{

	public function getNodeType(): string
	{
		return Node\Stmt\If_::class;
	}

	public function processNode(Node $node, Scope $scope)
	{
        if($node->elseifs){
            $count = count($node->elseifs);
            }
        else{
            $count = 0;
        }
		// returns an array with trait name and line - array{string, int}
		return [$count, $node->getLine()];

        }
        
	}

