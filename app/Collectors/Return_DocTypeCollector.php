<?php

namespace App\Collectors;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;

/**
 * @implements Collector<Node\Stmt\Function_, array{string, int}>
 */
class Return_DocTypeCollector implements Collector
{

    public function getNodeType(): string
    {
        return 'PhpParser\Node\Stmt\Return_';
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $funcName = $scope->getFunctionName();
        if ($funcName) {

            $className = "";
            if ($scope->isInClass()) {
                $className = $scope->getClassReflection()->getName();
                $funcName = $className . "::" . $funcName;
            }
            
            $docType = $scope->getFunction()->getVariants()[0]->getPhpDocReturnType();

            //if return type is null
            if (!$node->expr) {
                if ($docType instanceof PHPStan\Type\VoidType) {
                    return [];
                } else {
                    file_put_contents("./return-type-results/func-return-type.txt", $funcName . " -> " . get_class($docType) . ", " . "void" . PHP_EOL, FILE_APPEND);
                    return [];
                }

            }
            $returnExprType = $scope->getType($node->expr);

            if ($docType->isSuperTypeOf($returnExprType)) {
                return [];
            }

            $docType = get_class($docType);
            $returnExprType = get_class($returnExprType);


            if ($docType == 'PHPStan\Type\IntersectionType' || $returnExprType == 'PHPStan\Type\IntersectionType' || $returnExprType == 'PHPStan\Type\UnionType' || $docType == 'PHPStan\Type\UnionType') {
                file_put_contents("./return-type-results/func-doc-type-union-inter.txt", $funcName . " -> " . $docType . ", " . $returnExprType . PHP_EOL, FILE_APPEND);
                return [];
            }

            if ($docType == 'PHPStan\Type\MixedType') {
                file_put_contents("./return-type-results/func-doc-type-mixed.txt", $funcName . " -> " . $docType . ", " . $returnExprType . PHP_EOL, FILE_APPEND);
                return [];
            }

            if ($returnExprType == 'PHPStan\Type\MixedType') {
                file_put_contents("./return-type-results/func-return-type-mixed.txt", $funcName . " -> " . $docType . ", " . $returnExprType . PHP_EOL, FILE_APPEND);
                return [];
            }

            if ($docType != $returnExprType) {
                file_put_contents("./return-type-results/func-return-type.txt", $funcName . " -> " . $docType . ", " . $returnExprType . PHP_EOL, FILE_APPEND);
                return [];
            }

            // var_dump ($scope);
            // print_r($node);
            
        }
        return [];
    }

}

