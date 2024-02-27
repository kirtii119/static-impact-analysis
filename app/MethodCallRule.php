<?php
namespace App;

use _HumbugBox02f3b3909847\Fidry\Console\Internal\Generator\ClassName;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\RuleErrorBuilder;
use PHPUnit\Framework\Constraint\IsInstanceOf;

class MethodCallRule implements \PHPStan\Rules\Rule
{


	public function getNodeType(): string
	{
		return 'PHPStan\Node\CollectedDataNode';
	}

	public function processNode(Node $node, Scope $scope): array
	{
		$resultFile = './result2.txt';
        $meraData = $node->get(MethodCallCollector::class);

		foreach ($meraData as $file => $declarations) {
			file_put_contents($resultFile, $file . PHP_EOL , FILE_APPEND);
			foreach ($declarations as [$name, $line]) {
				file_put_contents($resultFile, "$name - $line" . PHP_EOL , FILE_APPEND);
				
			}
		}


		
       
        
        return [];

	}

}