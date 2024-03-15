<?php

$command = "phpstan-src/bin/phpstan analyse ";
$filenames = file(__DIR__.'/class-dependencies-fileNames-main/class-cons-params-0.txt', FILE_IGNORE_NEW_LINES+FILE_SKIP_EMPTY_LINES);
$i = 0;
for( $i = 3000; $i<count($filenames); $i++){

    $command .= $filenames[$i].' ';

    // if($i == 1000){
    //     break;
    // }
}

$command .= ">> result1.txt";
file_put_contents('./command.txt', $command);
exec($command, $output, $ret);
// var_dump($ret);

