<?php

namespace App;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;

/**
 * @implements Collector<Node\Stmt\ElseIf_, array{string, int}>
 */
class TrialCollector implements Collector
{

	public function getNodeType(): string
	{
		return Node\Expr\Assign::class;
	}

	public function processNode(Node $node, Scope $scope)
	{
        $resolved = $scope->getType($node->var);
		
        return [$resolved];
        
	}
}

