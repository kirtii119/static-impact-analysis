<?php 
class Foo
{
    public function doFooStuff()
    {
    }
}

class SomeTest
{
    public function testSomething()
    {
        $mockedFoo = $this–>createMock(Foo::class);
        // $mockedFoo is Foo&PHPUnit_Framework_MockObject_MockObject

        // we can call mock-configuration methods:
        $mockedFoo->method('doFooStuff')
            ->will($this->returnValue('fooResult'));

        // and also methods from Foo itself:
        $mockedFoo->doFooStuff();
    }
}