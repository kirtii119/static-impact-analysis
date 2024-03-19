<?php

$command = "phpstan-src/bin/phpstan analyse ";
$filenames = file(__DIR__.'/../run-results/class-dependencies-fileNames-main/class-cons-params-0.txt', FILE_IGNORE_NEW_LINES+FILE_SKIP_EMPTY_LINES);
for( $i = 0; $i<count($filenames); $i++){

    $command .= $filenames[$i].' ';

}

$command .= ">> result.txt";
file_put_contents('./trialFiles/command.txt', $command);
exec($command, $output, $ret);
// var_dump($ret);

