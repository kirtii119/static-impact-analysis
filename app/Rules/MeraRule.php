<?php
namespace App\Rules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\RuleErrorBuilder;

class MeraRule implements \PHPStan\Rules\Rule
{

	public function getNodeType(): string
	{
		return 'PHPStan\Node\CollectedDataNode';
	}

	public function processNode(Node $node, Scope $scope): array
	{
		// echo "here2";
		// var_dump($node);
		// var_dump($scope->isInClass());
		// echo('hereeeeee');
	

		$errors = [];

		$meraData = $node->get(MeraCollector::class);
		// array<string, list<array{string, int}>>
		foreach ($meraData as $file => $declarations) {
			foreach ($declarations as [$name, $line]) {
				if($name >= 1){

					$errors[] = RuleErrorBuilder::message(sprintf(
						'ElseIf is used %s times on line %s', $name , $line
					))->file($file)->line($line)->build();

				}
				
			}
		}

		return $errors;
	}

}