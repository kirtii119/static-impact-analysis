<?php
require_once 'vendor/autoload.php';
use PhpParser\ParserFactory;
use PhpParser\NodeDumper;
$code  = file_get_contents('/home/kirti/static-impact-analysis/tests/testCases/UnionTestCase.php');
$parser = (new ParserFactory())->createForNewestSupportedVersion();
$dumper = new NodeDumper();

$ast = $parser->parse($code);
echo $dumper->dump($ast);
