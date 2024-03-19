<?php

require_once("src/CallGraphBuilder.php");


class CallGraphSearch
{

  public $callGraphDir = __DIR__ . '/call-graphs';
  public $output_controllers = array();
  public $logfile = "./error.log";
  public $controllerUrlMap = [];
  function search($functionName)
  {


    // Iterate through files in the call graphs directory 
    foreach (scandir($this->callGraphDir) as $filename) {

      // Skip filenames "." and ".."
      if (in_array($filename, [".", ".."])) {
        continue;
      }

      //append full filePath
      $filePath = $this->callGraphDir . "/$filename";

      //array of all function calls in the file
      $lines = file($filePath, FILE_SKIP_EMPTY_LINES + FILE_IGNORE_NEW_LINES);

      $controller = str_replace(".txt", "", $filename);

      //controller doesn't already exist, only then search
      if (!in_array($controller, $this->output_controllers)) {
        $key = array_search("$functionName", $lines); //returns false if url not found 
        if ($key !== false) {
          array_push($this->output_controllers, $controller);
        }

      }
    }
  }


  function execute(string $functionName, string $methCallsFilename = __DIR__ . '/call-mappings/meth-calls.txt') : array | false
  {

    try {

      //1. build a map for method calls, static method calls
      $callGraphBuilder = new CallGraphBuilder();
      $funcCallMap = $callGraphBuilder->createMapFromTxt([$methCallsFilename, __DIR__ . '/call-mappings/static-calls.txt']);
      $callGraphBuilder->setup($funcCallMap);

      //2. build a map for controllers - url
      $this->controllerUrlMap = $callGraphBuilder->createMapFromTxt([__DIR__ . '/controller-url-map.txt']);

      //emptying call graph directory.
      if (is_dir($this->callGraphDir)) {
        $command = "rm -rf ".$this->callGraphDir."/*";
        shell_exec($command);
      } else {
        mkdir($this->callGraphDir);
      }


      //3. generate callGraphs for all entry points in controller-url map
      foreach ($this->controllerUrlMap as $entryPoint => $url) {
        $callGraphResult = $callGraphBuilder->run($entryPoint, CallGraphBuilder::LINEAR);
        file_put_contents($this->callGraphDir . "/".$entryPoint . '.txt', "");
        foreach ($callGraphResult as $line) {
          file_put_contents($this->callGraphDir . "/".$entryPoint . '.txt', $line . PHP_EOL, FILE_APPEND);
        }
      }


      //4. search input function's name in all generated call-graphs and o/p url if the function is present
      $this->search($functionName);
      $output_urls = [];
      if ($this->output_controllers) {
        // map controllers to urls
        foreach($this->output_controllers as $controller){
          $url = $this->controllerUrlMap[$controller][0];
          array_push($output_urls, $url);
        }

        return $output_urls;
      }
      return false;
    } catch (Exception $e) {
      error_log("Error: " . $e->getMessage() . PHP_EOL, 3, $this->logfile);
    }

  }
}