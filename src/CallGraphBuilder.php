<?php

$resultFile = './src/call-graph-result.json';
$inputFilename = ['/home/suyash/static-impact-analysis/staticcall.txt','/home/suyash/static-impact-analysis/func-calls.txt'];


class CallGraphBuilder
{

    public const LINEAR = 1;
    public const GRAPH = 2;

    private $callgraph = [];
    private $funcCallMap = [];


    /**
     * @param array $funCallMap -> ["function"=>["functionCall1", "functionCall2"]]
     */
    public function setup(array $map)
    {
        $this->funcCallMap = $map;
    }

    /**
     * @param string $entryPoint
     * @param int $type
     */
    public function run(string $entryPoint, int $type): array|false
    {
        if (!$this->funcCallMap) {
            return false;
        }


        $this->callgraph = [];
        if ($type == 1) {
            $this->buildLinearCallsList($entryPoint);
            return $this->callgraph;
        }

        $arrReference = &$this->callgraph;
        $this->buildCallGraph($entryPoint, $arrReference);
        return $this->callgraph;
    }

    /**
     * 
     * 
     */
    protected function buildLinearCallsList(string $callerFunction)
    {

        if (in_array($callerFunction, $this->callgraph)) {
            return;
        }

        array_push($this->callgraph, $callerFunction);

        if (!isset($this->funcCallMap[$callerFunction])) {
            return;
        }

        foreach ($this->funcCallMap[$callerFunction] as $funcCall) {
            $this->buildLinearCallsList($funcCall);
        }
    }

    /**
     * 
     * 
     */
    protected function buildCallGraph(string $callerFunction, array &$arrReference)
    {

        $arrReference[$callerFunction] = [];

        if (!isset($this->funcCallMap[$callerFunction])) {
            return;
        }

        foreach ($this->funcCallMap[$callerFunction] as $funcCall) {
            $callerFuncArrRefernce = &$arrReference[$callerFunction];
            $this->buildCallGraph($funcCall, $callerFuncArrRefernce);
        }
    }

    /**
     *  returns associative array like: ["function"=>["functionCall1", "functionCall2"]]
     */
    function createMapFromTxt(array $txtFile)
    {
        $mainMap = [];
         foreach ($txtFile as $file) {
            $rawMapping = explode("\n", file_get_contents($file));
            var_dump($file);
            foreach ($rawMapping as $line) {
              
                $explodedArr = explode("=>", $line);
                // var_dump($explodedArr);
                $key = trim($explodedArr[0]);
                $value = trim($explodedArr[1]);

                if (array_key_exists($key, $mainMap)) {
                    $mainMap[$key][] = $value;
                } else {
                    $mainMap[$key] = [$value];
                }
            }
            //var_dump($mainMap);

        }

        return $mainMap;

    }
}

// $funcCallMap  = (array)( json_decode(file_get_contents(__DIR__.'/func-call-mapping.json')));
$callGraphBuilder = new CallGraphBuilder();
$funCallMap = $callGraphBuilder->createMapFromTxt($inputFilename);
$callGraphBuilder->setup($funCallMap);
$callGraphResult = $callGraphBuilder->run("Magento\Catalog\Model\Product\Website\SaveHandler::execute", CallGraphBuilder::GRAPH);
file_put_contents($resultFile, json_encode($callGraphResult));