<?php
namespace App;

use _HumbugBox02f3b3909847\Fidry\Console\Internal\Generator\ClassName;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\RuleErrorBuilder;
use PHPUnit\Framework\Constraint\IsInstanceOf;

//include this rule only if you are returning somethign from the MethodCallCollector
class MethodCallRule implements \PHPStan\Rules\Rule
{
	public function getNodeType(): string
	{
		return 'PHPStan\Node\CollectedDataNode';
	}

	

	public function processNode(Node $node, Scope $scope): array
	{
		$resultFile = './func-call-mapping.json';
        $meraData = $node->get(MethodCallCollector::class);

		file_put_contents($resultFile, "" );
		$result = [];
		foreach ($meraData as $file => $declarations) {
			
			// file_put_contents($resultFile, $file . PHP_EOL , FILE_APPEND);
			foreach ($declarations as [$name, $line]) {
				foreach ($name as $myKey => $myValue){
					if(array_key_exists($myKey, $result)){
						$result[$myKey][] = $myValue;
					}
					else{
						$result[$myKey] = [$myValue];
					}
				}
			}
			// print_r($result);
		}
		file_put_contents($resultFile, json_encode($result) . PHP_EOL , FILE_APPEND);
        
        return [];

	}

}