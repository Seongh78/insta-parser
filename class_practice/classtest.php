<?php
class A{

    
    function foo(){
        if(isset($this)){
            echo '$this is defined(';
            echo get_class($this);
            echo ")<br>";
        }else{
            echo "\$this is not defined.<br>";
        }//else
    }
}
class B{
    function bar(){
        A::foo();
    }
}

$a = new A();
echo '1. $a->foor() : ';
$a->foo();

echo '2. A::foo() : ';
A::foo();

$b = new B();
echo '3. $b->bar';
$b->bar();

echo '4. B::bar() : ';
B::bar();


?>