# Problems

The main problem currently lies in the first part of the project i.e. Creating function calls mapping utilising phpStan. 

Whenever we list any function call, it’s class should be known to trace it ahead. If you look at `run-results/meth-calls-main.txt`, you’ll see some weird class names like mixedty, neverty, int, float etc. These are hard coded when the type of the calling object is not directly resolvable to a class. Check `app/Collectors/MethodCallCollector` ****for details. The line numbers mentioned below refer to `run-results/meth-calls-main.txt`

Some of these types are due to magento’s documentation mistakes, some due to poor documented code, and some just need to be handled better in phpstan type system.

Check this out understand php DocTypes : https://phpstan.org/writing-php-code/phpdoc-types

## **Collector level Problems**

- Magento php doctype is wrong
    1. /var/www/magento/vendor/magento/framework/View/Element/UiComponent/DataProvider/Reporting.php - 25
    2. /var/www/magento/vendor/magento/module-catalog-inventory/Model/Spi/StockStateProviderInterface.php - 44 - see implementations 
- Magento php doctype notation has syntax problem
    1. /var/www/magento/vendor/magento/module-import-export/Controller/Adminhtml/Export/GetFilter.php - 27
    2. /var/www/magento/vendor/magento/framework/DB/Statement/Pdo/Mysql.php - 36
    
    Check https://phpstan.org/writing-php-code/phpdocs-basics
    
- Handling Mixed Types
    1. When php doctype is explicitly mixed - /var/www/magento/vendor/magento/module-sales/Block/Order/Totals.php - 285
    2. php doc type mentioned is wrong that results in wrong identification of type - /var/www/magento/vendor/magento/module-import-export/Controller/Adminhtml/Export/GetFilter.php - 34
    
    Play around with some code and check stan’s system to handle mixed types better.
    
- Handling obj without class type
    - type object is mentioned directly
    
    /var/www/magento/vendor/magento/module-sales/Block/Order/Creditmemo/Items.php - 55
    
    - or in functional testing frameworks where local variable of the type object are created from object manager factory and type is not mentioned.
    - /var/www/magento/vendor/magento/framework/File/Uploader.php - line 447 : does not resolve to object and function name directly - compilation of strings. - **type to note**
    
    check for more instances
    
- Handling intersection & union type
    - Union type is mostly b/w
        - 2 classes - explicitly mentioned in doc types
        - (class name | null/string/false/bool/int) etc
        - two intersection types - both being resolved  (166321 in meth-calls-main.txt)
        
    - Intersection is b/w (2 or more)
        - interface & interface
        - $this & interface
        - class and interface
        - 2 classes where one is of the type mockobject - tests can be ignored
        - Exception & throwable. (classes extending exception)
        - class1 & class2 where one class extends another
        - eg. /var/www/magento/vendor/magento/module-inventory-in-store-pickup/Model/Source/InitPickupLocationExtensionAttributes.php - 39
        - not resolvable : /var/www/magento/setup/src/Magento/Setup/Console/Command/InstallCommand.php - 383 (166321 in func-calls-main.txt)
    - Class names are sometimes resolved to something like (resource | object | $this) - these might be further resolved.
    - If union type has (interface/className | null/false/int/bool) - it can be resolved to interface/className - though in this case the type hints should be better handled
    
    https://phpstan.org/blog/union-types-vs-intersection-types
    
- Handling Never Type
    
    This mostly occurs when that particular code will never be reached. Play around to understand this better
    
- Handling resource type
    
    resource is explicity mentioned as the type
    
- Handling array/ string/ int/ float/ bool/ null types
    - these mostly occur due to phpdoc type errors
    
    array : /var/www/magento/vendor/magento/module-catalog/Model/ProductLink/Search.php  - 64 
    
- $this in parent class / interface can refer to calling child class object too (not necessarily current class)
    
    child - /var/www/magento/vendor/magento/framework/View/Layout/Proxy.php :131
    
    child -  /var/www/magento/vendor/magento/framework/Translate/Inline/Proxy.php : 109
    
    interface - /var/www/magento/vendor/magento/framework/Webapi/Response.php - 47
    
- Call to methods of interface : When an interface is the data type, it needs to be mapped to it’s implementation (known from the calling class).
    - Currently generated call graphs are unable to trace the call stack beyond the interface. That means if a function is called from an interface, the graph is unable to track further calls from classes which implement the interface.
    - We feel it would be useful to map interfaces to their implemented classes.
    - The `interfaceCollector` does the job of storing classes and the interfaces they implement in the file `run-results/InterfaceCollected.txt`
    - `trialFiles/mapInterfacetoClass` takes InterfaceCollected.txt as input and creates a map of interfaces to the classes which implement the respective interface in a file present at `run-results/MapinterfaceClass.json`
- Get and Set methods
    
    Phpstan has functionality to deal with these magic methods but, not sure if it fully solves the problem.  https://phpstan.org/developing-extensions/class-reflection-extensions
    
- Check if return type is really wrong. Would you consider this and similar types wrong?
    1. /var/www/magento/vendor/magento/framework/Model/ResourceModel/Db/AbstractDb.php - 307
- **Number of occurences of each unresolved type in the meth-calls-main file**
    1. String Type: 18
    2. object without class Type: 281
    3. array type : 29
    4. int type : 18
    5. Boolean type : 1
    6. Float type : 3
    7. Mixed Type: 13852
    8. Intersection Type & : 127
    9. Union Type | : 4311
    10. Null Type : 26
    11. Never Type : 47
    12. Resource Type : 64
    13. Constant type : 0 - might be present in magento test documents
    14. This type & Object type : Resolved

https://phpstan.org/user-guide/troubleshooting-types

## Return type check

To move ahead, we first have to resolve **wrong doc types** to get some of the above ambiguities resolved. The approach decided upon was to compare all method return types to it’s phpdoctype mentioned. Additionally also check the ambiguity in the types of class properties’ doc types. 

- **Try 1:**
    
    You’ll find a file `app/Collectors/Return_DocTypeCollector.php` which was an attempt to achieve this using collectors. This directly compares the docType to the corresponding return expression type. But comparing it directly using an equality operator or instanceof or isSuperTypeOf is not the best choice as phpstan type system and phpdoctypes mentioned are not really the same always - it has got many edge cases.
    
- **Try 2:**
    
    Phpstan has handled these cases in it’s rules. So let’s use that. These are the relevant rules
    
    ```
    rules :
    
    	- PHPStan\Rules\Functions\ArrowFunctionReturnTypeRule
    	- PHPStan\Rules\Functions\ClosureReturnTypeRule
    	- PHPStan\Rules\Functions\ReturnTypeRule
    	- PHPStan\Rules\Methods\ReturnTypeRule
    	- PHPStan\Rules\Properties\TypesAssignedToPropertiesRule
    ```
    
    Added these rules in phpstan.neon, analysed over magento framework and dumped these results in `run-results/framework-property-result-error.txt`. Works well with some exceptions discussed ahead. `run-results/framework-result-error.txt` is the same analysis just without the last rule.
    
    **Note**: Phpstan rightly identifies if the doctype mentioned is the super-type of what is actually returned. So, if an interface/abstract class is the doctype but an implementation of it is returned, it classifies under no error, but vice-a-versa will not be true.
    
- **Try3:**
    
    Now, running this on files directly didn’t help much as everything is coupled. One thing depends on the other and any docType wrong in between affects many places. So let’s first scan the classes which have 0 dependencies and then move forward to classes with higher number of dependencies. Number of dependencies here are considered to be the number of parameters in the constructor of that corresponding class. Let’s start by finding out class dependencies.
    
    For this `app/Collectors/ClassDependencyCollector` is used. This was run to get results in 2-3 ways contained in:
    
    1. `run-results/class-dependencies-main/` : This directory contains files containing the class names of the constructors which have the corresponding dependencies. eg class-cons-params-0.txt contains classes with 0 dependencies and so on. `class-cons-params-main.txt` contains all possible classes with the corresponding number of dependencies.
    2. `run-results/class-dependencies-fileNames-main/` : This directory contains the filenames of the constructors with the corresponding dependencies in the same way.
    
    This **succesfully** gives us all classes with it’s dependencies
    
    Now, let’s use this and run stan’s rules on 0 dependency class files. To do this, `trialFiles/runClassDependencyCode` forms a phpstan-src/bin/phpstan analyse command compiling all these filenames and executing it. But Puff. It gives an Unable to fork error. Let’s dump the command in `trialFiles/command.txt` and run that by copy pasting it in the terminal. This exits with 
    
    ![Screenshot from 2024-03-18 18-27-47.png](https://prod-files-secure.s3.us-west-2.amazonaws.com/25a6bc0b-1c18-4d82-b275-0aaf39fe05f6/4d6aacb1-f7e5-473e-8eea-8018a48acb7f/Screenshot_from_2024-03-18_18-27-47.png)
    
    These results weren’t resolved.
    
    (Make sure to comment all collectors and uncomment just the rules before running this)
    
    Just to try running it, I ran this in batches of 1000 files. It worked well then. Now, the problem with the reult was that even though these seem to be classes with 0 dependencies, these extend, implement or use other classes somewhere or the other, and to resolve some undefined types we also need to pass other files from the magento codebase to phpstan. Check the results at `run-results/result0-OnlyFilesToBeAnalysedWODependencies.txt`
    
- **Try 4:**
    
    Now, let’s ditch the filenames and use classnames generated. `app/Rules/CustomMethodsReturnTypeRule.php app/Rules/CustomTypesAssignedToPropertiesRule.php`
    
    Check these rules, these are phpstan rules with a filter to skip all other classnames expect for classes with 0 dependencies. Check results at `run-results/result0Main-FilesToBeAnalysedWithDependencies`
    
    You can make similar custom rules corresponding to phpstan rules listed above. These results also have some problems, check some of them below.
    
- **Phpstan analysing wrong return type exceptions (problems which need to be solved):**
    - Not able to compare “$this” to actual object.
        
        Line   /var/www/magento/vendor/magento/framework/HTTP/Adapter/Curl.php
        
        ---
        
        :150   Method Magento\Framework\HTTP\Adapter\Curl::connect() should return
        
        $this(Magento\Framework\HTTP\Adapter\Curl) but returns Magento\Framework\HTTP\Adapter\Curl.
        
    - Wrongly qualifies “$this” or “self”(in parent class) to the parent class / interface itself as opposed to the calling(child) class. (But expected parent and given child is considered okay in phpstan - maybe it’s not able to compare “this”)
        
        Line   /var/www/magento/vendor/magento/framework/View/Layout/Proxy.php
        
        :109   Method Magento\Framework\View\Layout\Proxy::setGeneratorPool() should return $this(Magento\Framework\View\Layout\Proxy) but returns Magento\Framework\View\Layout.
        
        ---
        
        Line   /var/www/magento/vendor/magento/framework/Translate/Inline/Proxy.php
        
        :131   Method Magento\Framework\Translate\Inline\Proxy::processResponseBody() should return $this(Magento\Framework\Translate\Inline\Proxy) but returns Magento\Framework\Translate\Inline.
        
        ---
        
        Line   /var/www/magento/vendor/magento/framework/Webapi/Response.php
        
        :47    Method Magento\Framework\Webapi\Response::setMimeType() should return
        
        $this(Magento\Framework\Webapi\Response) but returns Magento\Framework\App\Response\HttpInterface.
        
        ---
        
    - Return Type is not mentioned so is considered void.
        
        Line   /var/www/magento/vendor/magento/framework/Xml/Parser.php
        
        :37    Method Magento\Framework\Xml\Parser::__construct() with return type void returns $this(Magento\Framework\Xml\Parser) but should not return anything.
        
    - For union types if doctype is mentioned like ClassName | false and method never returns false, stan would not raise an issue.
        
        eg: /var/www/magento/vendor/magento/framework/Model/ResourceModel/Db/AbstractDb.php - 307 
        
        This doesn’t seem to be returning false. This can hamper type analysis ahead.
        
    - Check -
        
        **Doc type of Sibling is mentioned**  /var/www/magento/vendor/magento/framework/Data/Form/Element/AbstractElement.php
        
        ---
        
        :131   Method Magento\Framework\Data\Form\Element\AbstractElement::addElement() should return Magento\Framework\Data\Form but returns $this(Magento\Framework\Data\Form\Element\AbstractElement).
        
        **Returns an interface but mentioned class as a return type.**
        
        Line    /var/www/magento/vendor/magento/framework/View/Element/AbstractBlock.php
        
        ---
        
        :402    Method Magento\Framework\View\Element\AbstractBlock::addChild() should return
        
        $this(Magento\Framework\View\Element\AbstractBlock) but returns
        
        Magento\Framework\View\Element\BlockInterface.
        

**Other problems:**

- Handling / Interpreting XML files
- Handling Plugins
- Recognising exact changed function names from git commit/ PRs   - last priority

# Test Cases

We’ve written some tests and test cases to understand some problems better. Check them out at `tests/*`

Setup phpunit in the `tools` directory -  https://docs.phpunit.de/en/11.0/installation.html 

Use this command to run specific tests

```bash
./tools/phpunit.phar ./tests/<Test-name>.php 
```

We have divided tests into 3 types

1. Method Call Collecter Tests - based on the method call mapping
    - All these are passed test cases - but consider if union type has $this as a result, that needs to be resolved further then and there. (Such cases exists in magento)
2. Callgraph Tests - based on the CallGraphBuilder
    - Basic code required to run CallGraphBuilder is good to go. Intersection and union types need to be handled.
3. End to End Tests - based on the start input and expected end results
    - This contains failings tests based on interfaces & plugins.

**Note:** 

1. Except Callgraph tests, rest of the test cases are based on MethodCallCollector, so make sure to keep it uncommented in phpstan.neon . Rest of the collectors are not tested with these tests.
2. These modify call-mapping-results, because it is considered that call-mappings are intermediate and will be wiped off after every run. If you have created any call mappings that you want to save make sure to shift it to a new file in run-results or setup file versioning. 

We tried listing these to get a better view of the project, keep appending to reach an exhaustive list

**Track functions by tracing/ keeping track of:**

1. method calls
2. function calls
3. static method calls
4. constructors - when objects are created, Dependency injection
5. inheritance - only constructor 
6. XML files to see what is fired
7. Plugins