<?php declare(strict_types = 1);

namespace App\Rules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Node\PropertyAssignNode;
use PHPStan\Reflection\PropertyReflection;
use PHPStan\Rules\IdentifierRuleError;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Rules\RuleLevelHelper;
use PHPStan\Type\VerbosityLevel;
use PHPStan\Rules\Properties\PropertyReflectionFinder;
use PHPStan\Rules\Properties\FoundPropertyReflection;
use function array_merge;
use function sprintf;

/**
 * @implements Rule<PropertyAssignNode>
 */
class CustomTypesAssignedToPropertiesRule implements Rule
{
	public $classList ;

	public function __construct(
		private RuleLevelHelper $ruleLevelHelper,
		private PropertyReflectionFinder $propertyReflectionFinder,
	)
	{
			//----------added code-----------
			$this->classList  = file(__DIR__.'/../../class-dependencies-main/class-cons-params-0.txt', FILE_IGNORE_NEW_LINES+FILE_SKIP_EMPTY_LINES);
			//---------------------------------
	}

	public function getNodeType(): string
	{
		return PropertyAssignNode::class;
	}

	public function processNode(Node $node, Scope $scope): array
	{
		  //-----added code------
		  if ($scope->isInClass()) {
            $className = $scope->getClassReflection()->getName();
			if(!$scope->getNamespace()){
				$className = "\\".$className;
			}
            if(!in_array($className, $this->classList)){
                return [];
            }
            
        }
		else{
			return [];
		}

        //---------------------------



		$propertyReflections = $this->propertyReflectionFinder->findPropertyReflectionsFromNode($node->getPropertyFetch(), $scope);

		$errors = [];
		foreach ($propertyReflections as $propertyReflection) {
			$errors = array_merge($errors, $this->processSingleProperty(
				$propertyReflection,
				$node->getAssignedExpr(),
			));
		}

		return $errors;
	}

	/**
	 * @return list<IdentifierRuleError>
	 */
	private function processSingleProperty(
		FoundPropertyReflection $propertyReflection,
		Node\Expr $assignedExpr,
	): array
	{
		if (!$propertyReflection->isWritable()) {
			return [];
		}

		$propertyType = $propertyReflection->getWritableType();
		$scope = $propertyReflection->getScope();
		$assignedValueType = $scope->getType($assignedExpr);

		$accepts = $this->ruleLevelHelper->acceptsWithReason($propertyType, $assignedValueType, $scope->isDeclareStrictTypes());
		if (!$accepts->result) {
			$propertyDescription = $this->describePropertyByName($propertyReflection, $propertyReflection->getName());
			$verbosityLevel = VerbosityLevel::getRecommendedLevelByType($propertyType, $assignedValueType);

			return [
				RuleErrorBuilder::message(sprintf(
					'%s (%s) does not accept %s.',
					$propertyDescription,
					$propertyType->describe($verbosityLevel),
					$assignedValueType->describe($verbosityLevel),
				))
					->identifier('assign.propertyType')
					->acceptsReasonsTip($accepts->reasons)
					->build(),
			];
		}

		return [];
	}

	private function describePropertyByName(PropertyReflection $property, string $propertyName): string
	{
		if (!$property->isStatic()) {
			return sprintf('Property %s::$%s', $property->getDeclaringClass()->getDisplayName(), $propertyName);
		}

		return sprintf('Static property %s::$%s', $property->getDeclaringClass()->getDisplayName(), $propertyName);
	}

}
