<?php

require_once("src/CallGraphBuilder.php");


class CallGraphSearch
{

  public $callGraphDir = __DIR__ . '/call-graphs';
  public $output_urls = array();
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

      $url = str_replace(".txt", "", $filename);

      //url doesn't already exist, only then search
      if (!in_array($url, $this->output_urls)) {
        $key = array_search("$functionName", $lines); //returns false if url not found 
        if ($key !== false) {
          array_push($this->output_urls, $url);
        }

      }
    }
  }


  function execute(string $functionName)
  {

    try {

      //1. build a map for method calls, static method calls
      $callGraphBuilder = new CallGraphBuilder();
      $funcCallMap = $callGraphBuilder->createMapFromTxt([__DIR__ . '/../meth-calls.txt', __DIR__ . '/../static-calls.txt']);
      $callGraphBuilder->setup($funcCallMap);

      //2. build a map for controllers - url
      $this->controllerUrlMap = $callGraphBuilder->createMapFromTxt([__DIR__ . '/controller-url-map.txt']);


      if (is_dir($this->callGraphDir)) {
        // foreach(scandir($this->callGraphDir) as $filename) { 
        //   if (in_array($filename, [".", ".."])) {
        //     continue;
        //   }
        //   $filePath = $this->callGraphDir . "/$filename";
        //       unlink($filePath);
        // }  

        $command = "rm -rf ".$this->callGraphDir."/*";
        shell_exec($command);
      
      } else {
        mkdir($this->callGraphDir);
      }


      //3. generate callGraphs for all entry points in urls.txt
      foreach ($this->controllerUrlMap as $entryPoint => $url) {
        $callGraphResult = $callGraphBuilder->run($entryPoint, CallGraphBuilder::LINEAR);
        file_put_contents(__DIR__ . '/call-graphs/' . $url[0] . '.txt', "");
        foreach ($callGraphResult as $line) {
          file_put_contents(__DIR__ . '/call-graphs/' . $url[0] . '.txt', $line . PHP_EOL, FILE_APPEND);
        }
      }


      //3. search input function's name in all extracted files and o/p url if the function is present
      $this->search($functionName);
      if ($this->output_urls) {
        // var_dump($this->output_urls);
        return $this->output_urls;
      }
      return -1;
    } catch (Exception $e) {
      error_log("Error: " . $e->getMessage() . PHP_EOL, 3, $this->logfile);
    }

  }
}

//extract_script.sh should have permissions to access /tmp/spx