<?php
// Script to extract variable types using PHPStan API
require_once __DIR__.'/vendor/autoload.php';

use PHPStan\Analyser\Scope;
use PHPStan\Type\Type;
use PHPStan\Type\TypeResolver;

class CustomTypeResolver implements \PHPStan\Type\DynamicMethodReturnTypeExtension
{
    /**
     * @var TypeResolver
     */
    private $typeResolver;

    public function __construct(TypeResolver $typeResolver)
    {
        $this->typeResolver = $typeResolver;
    }

    public function getClass(): string
    {
        // Specify the class for which you want to provide dynamic return types
        return MyClass::class;
    }

    public function isMethodSupported(string $method): bool
    {
        // Specify the method(s) for which you want to provide dynamic return types
        return $method === 'getDynamicReturnType';
    }

    public function getTypeFromMethodCall(
        \PHPStan\Reflection\MethodReflection $methodReflection,
        \PhpParser\Node\Expr\MethodCall $methodCall,
        \PHPStan\Analyser\Scope $scope
    ): Type {
        // Return the dynamically resolved return type based on the provided method call
        return $this->typeResolver->resolve('int|string');
    }
}
