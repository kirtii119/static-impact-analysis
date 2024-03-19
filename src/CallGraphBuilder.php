<?php

// $resultFile = './src/call-graph-result.json';
// $inputFilename = ['/home/suyash/static-impact-analysis/staticcall.txt','/home/suyash/static-impact-analysis/func-calls.txt'];


class CallGraphBuilder
{

    public const LINEAR = 1;
    public const GRAPH = 2;

    private $callgraph = [];
    private $funcCallMap = [];


    /**
     * @param array $map -> ["function"=>["functionCall1", "functionCall2"]]
     */
    public function setup(array $map)
    {
        $this->funcCallMap = $map;
    }

    /**
     * @param string $entryPoint
     * @param int $mode
     */
    public function run(string $entryPoint, int $mode): array|string
    {
        if (!$this->funcCallMap) {
            return "Setup not done";
        }


        $this->callgraph = [];
        if ($mode == 1) {
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
    public function createMapFromTxt(array $txtFile)
    {
        $mainMap = [];
         foreach ($txtFile as $file) {
            $rawMapping = file($file, FILE_SKIP_EMPTY_LINES + FILE_IGNORE_NEW_LINES);
            foreach ($rawMapping as $line) {
              
                $explodedArr = explode("=>", $line);
                $key = trim($explodedArr[0]);
                $value = trim($explodedArr[1]);

                if (array_key_exists($key, $mainMap)) {
                    $mainMap[$key][] = $value;
                } else {
                    $mainMap[$key] = [$value];
                }
            }
        }

        return $mainMap;

    }
}
