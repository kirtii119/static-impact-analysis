# Functionality

## **Creating function call mappings:**

- Static analysis is based on collectors (stored in the `app` directory) to gather function calls, method calls, static method calls from the code. Refer https://github.com/nikic/PHP-Parser to understand the difference between the 3. We’ll use the word ‘function’ ahead to address these.
    - Refer to https://phpstan.org/developing-extensions/collectors for more information on collectors.
- Mappings are stored in the form className::MethodName ⇒ MethCallClassName::MethCall. All the calls are dumped into .txt files which can be found at `src/call-mappings`.
    - Magento vendor directory scan for method calls is already stored at `run-results/meth-calls-main.txt`. Re-running this on magento is a time consuming task.
    - Call-mappings are intermediate and will be wiped off after every run (if you run with generate call mappings script or run tests). If you have created any call mappings that you want to save make sure to shift it to a new file in run-results or setup file versioning.
- The `phpstan.neon` file (located at the repository root) configures these collectors. Make sure it’s rightly configured according to your needs everytime you use phpstan. For this step you’ll just need MethodCallCollector, FunctionCallCollector, StaticMethodCallCollector uncommented. Refer https://phpstan.org/config-reference

**Notes for phpstan: (These are observations - not facts)**

1. Collectors’ get type methods are called once per process at the beginning - but there are exceptions when additonal processes are fired (need to figure out still) - don’t rely on this function for running any code once.
2. Collectors’ get type methods are called irrespective of cache.
3. Collectors’ process node methods are not called when results are cached. So make sure to clean cache by using `phpstan-src/bin/phpstan clear-result-cache command` whenever you want to process nodes to run again.

## **Call Graph Builder:**

- The `CallGraphBuilder` file (in the `src` directory) generates results in two modes: Linear and Graph.
- **Linear:**
    - Lists the entry point function and all the trailing functions that could be called in the whole execution. It skips a previously seen function in the call stack. Use this when you are just concerned about what all functions can be called in the whole execution. This suffices our purpose.
- **Graph:**
    - Lists all functions called in a nested array fashion, showcasing proper sibling and children relationship between the functions and function calls. This includes repeated similar call stacks. Use this when you want to visualise the flow of function calls.
    
    **Caution:** This mode will enter an infinite loop if direct or indirect recursive calls are present.
    

**File: callgraphbuilder.php:**

- The CallGraphBuilder class consists of 3 public functions:
    - `createMapFromTxt` function takes an array of txt files as input and returns a function to function calls associative array of the form: ["function1"=>["functionCall1", "functionCall2"]]. For our purpose it can take meth-calls.txt, func-calls.txt & static-meth-calls.txt as input. This is basically processing our raw dump from collectors. Ensure these files contain analysis of the same codebase.
    - `setup` function takes the map of the form ["function1"=>["functionCall1", "functionCall2"]] as input and just assigns it to the CallGraphBuilder object. This is a necessary step to run.
    - `run` function requires `entryPoint` function name and the `mode` as parameters and returns a Call Graph array.
        - In linear mode `CallGraphBuilder::LINEAR` , it calls `buildLinearCallsList`.
        - In graph mode `CallGraphBuilder::GRAPH` , it calls `buildCallGraph`.
    
    To try this, configure and run the file `trialFiles/CallGraphTrialRun.php`. You can set the mode, inputFilename, entryPoint and the result file. 
    
    This code creates a Call Graph Builder Object and uses the function createMapFromTxt to create a map. You can dump this map to understand it better. See `run-results/magento-framework-func-call-mapping.json` as an example. This map is then passed to the callgraphbuilder setup function and subsequently the run function is called.
    

## **Running the functionality**

- `index.php`  in the entry point of the application. It just takes the input, hands over the control to `src/CallGraphSearch::execute` function and displays the output.
- `CallGraphSearch` has 2 functions
    - `execute`:
        - i/p  -  $functionName, optional $methCallsFilename, o/p : array of urls or false if function is not present in any url
        - This functions first builds a map for method calls, static method calls present in `src/call-mappings`. For meth-calls mapping, it can also use the files passed as an input (if passed). For static method calls it just uses the default file at `src/call-mappings`. It currently doesn’t use the function call mapping at all.
        - Next it builds a controller-url map from `src/controller-url-map.txt` and then empties the `src/call-graphs` directory.
        - Next, it generates callGraphs for all entry points (controllers) from the controller-url map in the `src/call-graphs` directory.
        - Next, it use the `search` function to search the input function's name in all generated call-graphs and o/p url if the function is present
    - `search` : input  -  $functionName
        - This function iterates through all the files in the call graph directory and finds the urls affected by the input functionName.

## **Tips:**

**PhpStan Type System is the supreme ruler for the function calls mapping.** Once you understand how it interprets AST into PhpStan Type system, it’ll be easier.

- Scope : https://phpstan.org/developing-extensions/scope
- Type System : https://phpstan.org/developing-extensions/type-system
- How Phpstan narrows down types : https://phpstan.org/writing-php-code/narrowing-types - **Most Important**
- Php stan Blogs can really help : https://phpstan.org/blog
- You MIGHT want to add a custom node resolver extension to override how stan converts *PHPDoc Type AST* into *PhpStan Type System. -* it’ll not be required directly in the current approach used but knowing that it exists might be helpful ahead, specially to handle complex types. https://phpstan.org/developing-extensions/custom-phpdoc-types

Though this functionality completes the flow of the project, there are problems which need to be resolved. Check them out in the [Problems Section](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Problems.md).

## Additional Functionality

- Class Dependency Collectors & return type check rules :
    
    These rules & collectors can be found in the `app` directory
    
    Check [Return Type Check](REPLACE THIS) in the [Problems Section](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Problems.md) to understand this.
    
- Interface to Class Mappings:
    - The `interfaceCollector` does the job of storing classes and the interfaces they implement in the file `run-results/InterfaceCollected.txt`
    - `trialFiles/mapInterfacetoClass` takes InterfaceCollected.txt as input and creates a map of interfaces to the classes which implement the respective interface in a file present at `run-results/MapinterfaceClass.json`
    
    Check the [calls to methods of an interface](REPLACE THIS) problem in the [Problems Section](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Problems.md).
