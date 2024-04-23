# Problems
The main problem currently lies in the first part of the project i.e. Creating function calls mapping utilising phpStan. 

Whenever we list any function call, it’s class should be known to trace it ahead. If you look at `run-results/meth-calls-main.txt`, you’ll see some weird class names like mixedty, neverty, int, float etc. These are hard coded when the type of the calling object is not directly resolvable to a class. Check `app/Collectors/MethodCallCollector` for details. The line numbers mentioned below correspond to `run-results/meth-calls-main.`.

Some of these types are due to magento’s documentation mistakes, some due to poor documented code, and some just need to be handled better in phpstan type system.

Check this out understand php DocTypes : https://phpstan.org/writing-php-code/phpdoc-types

## **Collector level Problems**

<ul id="1c5427ff-1021-4861-ad4d-2a83af60b9b8" class="toggle"><li><details open=""><summary>Magento php doctype is wrong</summary><ol type="1" id="989bf465-cff2-4206-9695-2fe126c36264" class="numbered-list" start="1"><li>/var/www/magento/vendor/magento/framework/View/Element/UiComponent/DataProvider/Reporting.php - 25</li></ol><ol type="1" id="320cfc4c-6b67-478a-88c9-f08bad2a06f6" class="numbered-list" start="2"><li>/var/www/magento/vendor/magento/module-catalog-inventory/Model/Spi/StockStateProviderInterface.php - 44 - see implementations </li></ol></details></li></ul><ul id="9f580e14-3a0d-4a06-aec2-28071e47111f" class="toggle"><li><details open=""><summary>Magento php doctype notation has syntax problem</summary><ol type="1" id="7ac27a2e-fa3a-4e04-ac35-acf8938c6c50" class="numbered-list" start="1"><li>/var/www/magento/vendor/magento/module-import-export/Controller/Adminhtml/Export/GetFilter.php - 27</li></ol><ol type="1" id="4b145c85-a2a8-4b90-a6c3-365591670eb5" class="numbered-list" start="2"><li>/var/www/magento/vendor/magento/framework/DB/Statement/Pdo/Mysql.php - 36</li></ol><p id="9da6ccf1-a3a0-4c9c-ae01-af0175379327" class="">Check <a href="https://phpstan.org/writing-php-code/phpdocs-basics">https://phpstan.org/writing-php-code/phpdocs-basics</a></p></details></li></ul><ul id="0cbf5044-df4f-4691-bfdd-a811114ca71a" class="toggle"><li><details open=""><summary>Handling Mixed Types</summary><ol type="1" id="d85fe227-79b0-4fb0-8d7b-ed95fdfd2d1e" class="numbered-list" start="1"><li>When php doctype is explicitly mixed - /var/www/magento/vendor/magento/module-sales/Block/Order/Totals.php - 285</li></ol><ol type="1" id="c132e46e-8e85-4f74-8592-ac64597a2a60" class="numbered-list" start="2"><li>php doc type mentioned is wrong that results in wrong identification of type - /var/www/magento/vendor/magento/module-import-export/Controller/Adminhtml/Export/GetFilter.php - 34</li></ol><p id="3b9f1aac-cabe-47d9-8fe3-1ef7fce58e70" class="">Play around with some code and check stan’s system to handle mixed types better.<div class="indented"><p id="53cf7005-7206-4037-a2d6-46808cb56a7c" class="">
</p></div></p></details></li></ul><ul id="77ffc043-0eb6-4407-8244-452ad2673cc6" class="toggle"><li><details open=""><summary>Handling obj without class type</summary><ul id="94da4dc5-757d-4eba-aa28-b066470b75ee" class="bulleted-list"><li style="list-style-type:disc">type object is mentioned directly </li></ul><p id="b0d4a841-f7dc-4da5-9712-2009a0c5247d" class="">/var/www/magento/vendor/magento/module-sales/Block/Order/Creditmemo/Items.php - 55</p><ul id="88ecdb39-5d85-4077-8993-dc6017dfc6b0" class="bulleted-list"><li style="list-style-type:disc">or in functional testing frameworks where local variable of the type object are created from object manager factory and type is not mentioned.</li></ul><ul id="059ae4af-88d2-47b0-8553-896bbb0f03fa" class="bulleted-list"><li style="list-style-type:disc">/var/www/magento/vendor/magento/framework/File/Uploader.php - line 447 : does not resolve to object and function name directly - compilation of strings. - <strong>type to note</strong></li></ul><p id="84f0a3e5-2e00-429f-8c91-45a251e0812d" class="">check for more instances</p></details></li></ul><ul id="95ac0f0b-8e07-4628-88ff-215ccdd88f4f" class="toggle"><li><details open=""><summary>Handling intersection &amp; union type</summary><ul id="55217ada-8c0f-4e3e-a36a-6096a68ceff9" class="toggle"><li><details open=""><summary>Union type is mostly b/w</summary><ul id="433b62bd-5d29-4806-9ece-966bee21464e" class="bulleted-list"><li style="list-style-type:disc">2 classes - explicitly mentioned in doc types</li></ul><ul id="08b1b1c7-09cc-407b-8b82-69cb12b9bc93" class="bulleted-list"><li style="list-style-type:disc">(class name | null/string/false/bool/int) etc</li></ul><ul id="e013d9b2-bf2f-4930-bbd1-5a01c56ef9aa" class="bulleted-list"><li style="list-style-type:disc">two intersection types - both being resolved  (166321 in meth-calls-main.txt)</li></ul><p id="006f4529-d650-4d95-8047-74626bd8610c" class="">
</p></details></li></ul><ul id="8f52ac51-e32a-49cc-ba12-3ece078ba3cf" class="toggle"><li><details open=""><summary>Intersection is b/w (2 or more)</summary><ul id="97dc8d01-46aa-4c9e-af15-80c8556f191e" class="bulleted-list"><li style="list-style-type:disc">interface &amp; interface</li></ul><ul id="7cf61aba-a30a-4555-8379-0390fa06b406" class="bulleted-list"><li style="list-style-type:disc">$this &amp; interface</li></ul><ul id="f7a8e0eb-b46a-4de7-b24e-c0609e6eb0e1" class="bulleted-list"><li style="list-style-type:disc">class and interface </li></ul><ul id="2ba8e5f8-842d-479e-8d98-e8bd25d3e963" class="bulleted-list"><li style="list-style-type:disc">2 classes where one is of the type mockobject - tests can be ignored</li></ul><ul id="baf2079c-7d2e-4858-935d-a4d0b582f455" class="bulleted-list"><li style="list-style-type:disc">Exception &amp; throwable. (classes extending exception)</li></ul><ul id="d986773c-bf56-40a1-9f22-f83c64897a47" class="bulleted-list"><li style="list-style-type:disc">class1 &amp; class2 where one class extends another</li></ul><ul id="b6eda3bd-d45c-4540-a035-832b90f82fbb" class="bulleted-list"><li style="list-style-type:disc">eg. /var/www/magento/vendor/magento/module-inventory-in-store-pickup/Model/Source/InitPickupLocationExtensionAttributes.php - 39</li></ul><ul id="1c88f046-393c-4f6b-b95a-2b7ee407679d" class="bulleted-list"><li style="list-style-type:disc">not resolvable : /var/www/magento/setup/src/Magento/Setup/Console/Command/InstallCommand.php - 383 (166321 in func-calls-main.txt)</li></ul></details></li></ul><ul id="45476e33-966d-4494-bdfc-450d375aa62d" class="bulleted-list"><li style="list-style-type:disc">Class names are sometimes resolved to something like (resource | object | $this) - these might be further resolved.</li></ul><ul id="e2f75dbd-e151-4376-af72-0c9d124553ba" class="bulleted-list"><li style="list-style-type:disc">If union type has (interface/className | null/false/int/bool) - it can be resolved to interface/className - though in this case the type hints should be better handled</li></ul><p id="120f8535-3efc-4e0b-9105-18bb9a7b31fc" class=""><a href="https://phpstan.org/blog/union-types-vs-intersection-types">https://phpstan.org/blog/union-types-vs-intersection-types</a></p><p id="417adf44-9af1-4c8f-9a2a-f2b49be97c2e" class="">
</p></details></li></ul><ul id="09d53909-5b88-48cf-8f3b-3dcd1c0947d9" class="toggle"><li><details open=""><summary>Handling Never Type</summary><p id="0ffe9381-4205-444c-910d-367eda58a95d" class="">This mostly occurs when that particular code will never be reached. Play around to understand this better</p></details></li></ul><ul id="e4fefbb7-6dd7-4fbf-9dee-1270412b6846" class="toggle"><li><details open=""><summary>Handling resource type</summary><p id="e67e4488-4a7f-42d6-bc10-37be45e48a4f" class="">resource is explicity mentioned as the type</p></details></li></ul><ul id="398dc18f-59c4-443b-80a7-c7c022c036d1" class="toggle"><li><details open=""><summary>Handling array/ string/ int/ float/ bool/ null types</summary><ul id="79d412db-9b41-44e3-9dbb-4ed5796f10ca" class="bulleted-list"><li style="list-style-type:disc">these mostly occur due to phpdoc type errors</li></ul><p id="82bb542a-e639-436e-8536-3d8596e698ff" class="">array : /var/www/magento/vendor/magento/module-catalog/Model/ProductLink/Search.php  - 64 </p><p id="9f8ab79e-91ca-4b17-b486-848486604b5f" class="">
</p></details></li></ul><ul id="072a4d23-fe31-4d32-af0e-bc1c6b7d90e5" class="toggle"><li><details open=""><summary>$this in parent class / interface can refer to calling child class object too (not necessarily current class)</summary><p id="cac6db6e-a351-404c-918a-c009ec85b18a" class="">child - /var/www/magento/vendor/magento/framework/View/Layout/Proxy.php :131</p><p id="d7263f7f-9f77-48ff-be47-d1349971501a" class="">child -  /var/www/magento/vendor/magento/framework/Translate/Inline/Proxy.php : 109</p><p id="bc14686c-8396-46cf-acd4-f1ec99267e04" class="">interface - /var/www/magento/vendor/magento/framework/Webapi/Response.php - 47</p><p id="9f39564e-225e-417d-9ca6-04b2690ceb08" class="">
</p></details></li></ul><ul id="baf137f8-8cc3-4a91-9f2d-9b2b4e554a10" class="toggle"><li><details open=""><summary>Call to methods of interface : When an interface is the data type, it needs to be mapped to it’s implementation (known from the calling class).</summary><ul id="a4006b2a-29d1-41d6-94c7-3ae9853aaf6a" class="bulleted-list"><li style="list-style-type:disc">Currently generated call graphs are unable to trace the call stack beyond the interface. That means if a function is called from an interface, the graph is unable to track further calls from classes which implement the interface.</li></ul><ul id="18d0a672-a9fa-4b07-acbe-7a59fcbeb63d" class="bulleted-list"><li style="list-style-type:disc">We feel it would be useful to map interfaces to their implemented classes.</li></ul><ul id="fa9d4870-e6f4-4994-8ae9-8202e60adf75" class="bulleted-list"><li style="list-style-type:disc">The <code>interfaceCollector</code> does the job of storing classes and the interfaces they implement in the file <code>run-results/InterfaceCollected.txt</code></li></ul><ul id="6fadf665-cbd7-42a3-8741-2fe9880a75df" class="bulleted-list"><li style="list-style-type:disc"><code>trialFiles/mapInterfacetoClass</code> takes InterfaceCollected.txt as input and creates a map of interfaces to the classes which implement the respective interface in a file present at <code>run-results/MapinterfaceClass.json</code></li></ul></details></li></ul><ul id="afb7e6df-4ea2-4b1e-b523-2a2732b19234" class="toggle"><li><details open=""><summary>Get and Set methods</summary><p id="3b8a1851-346a-44e8-9899-06a659095016" class="">Phpstan has functionality to deal with these magic methods but, not sure if it fully solves the problem.  <a href="https://phpstan.org/developing-extensions/class-reflection-extensions">https://phpstan.org/developing-extensions/class-reflection-extensions</a></p></details></li></ul><ul id="53cc38a5-49c0-45f3-b1b4-af5204c48ec9" class="toggle"><li><details open=""><summary>Check if return type is really wrong. Would you consider this and similar types wrong?</summary><ol type="1" id="ab4b43ee-a57e-450a-8e01-6aecf11c4e65" class="numbered-list" start="1"><li>/var/www/magento/vendor/magento/framework/Model/ResourceModel/Db/AbstractDb.php - 307</li></ol></details></li></ul><ul id="0b15fb57-1f70-4df3-9542-59193b09ff0d" class="toggle"><li><details open=""><summary><strong>Number of occurences of each unresolved type in the meth-calls-main file</strong></summary><ol type="1" id="299a45e4-c538-444a-a22d-2ba8056f5209" class="numbered-list" start="1"><li>String Type: 18</li></ol><ol type="1" id="554de012-1a43-481c-bf8c-9d9aae673a9f" class="numbered-list" start="2"><li>object without class Type: 281</li></ol><ol type="1" id="6ea4528e-31f6-40df-8b46-f40ed42054e8" class="numbered-list" start="3"><li>array type : 29</li></ol><ol type="1" id="fad9ea64-9dd0-4d66-bc8c-887e98404db1" class="numbered-list" start="4"><li>int type : 18</li></ol><ol type="1" id="d088c6a6-87f9-47a2-bb38-a7d212f507a1" class="numbered-list" start="5"><li>Boolean type : 1</li></ol><ol type="1" id="a55f714f-7b4d-49bd-878a-8639e40643e8" class="numbered-list" start="6"><li>Float type : 3</li></ol><ol type="1" id="d33891ce-e20e-4d26-b664-42e3995a4aa1" class="numbered-list" start="7"><li>Mixed Type: 13852</li></ol><ol type="1" id="0bd6d6fa-dbcc-4c58-9168-92e1ebe1dfe8" class="numbered-list" start="8"><li>Intersection Type &amp; : 127</li></ol><ol type="1" id="34584bb9-6274-4882-b1f8-05d6ca6d961f" class="numbered-list" start="9"><li>Union Type | : 4311</li></ol><ol type="1" id="dfeb6771-bae7-475d-979b-c612e04c67b2" class="numbered-list" start="10"><li>Null Type : 26</li></ol><ol type="1" id="81c3e38c-5660-4466-979c-ded42dd21d65" class="numbered-list" start="11"><li>Never Type : 47</li></ol><ol type="1" id="fa22107e-3d05-496b-b805-fc064012f14f" class="numbered-list" start="12"><li>Resource Type : 64</li></ol><ol type="1" id="ca1ce31b-2b54-4beb-8441-1a190bac3e54" class="numbered-list" start="13"><li>Constant type : 0 - might be present in magento test documents</li></ol><ol type="1" id="469e3e95-7100-4500-bc1e-12a86dc365e7" class="numbered-list" start="14"><li>This type &amp; Object type : Resolved</li></ol></details></li></ul><p id="acc2a839-bee0-427d-ab80-920403d2d7cb" class=""><a href="https://phpstan.org/user-guide/troubleshooting-types">https://phpstan.org/user-guide/troubleshooting-types</a></p>


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
