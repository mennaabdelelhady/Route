<?php

//solid
/* s =>Single Responsibility - SRP
O =>Open Closed -OCP
L => Liskov Substitution - LSP
I => Interface Seg -ISP
D => Dependency Inve - DIP*/
class Test{
    public function _construct(){
        echo "Hi";
    }
    public function _destruct(){
        echo "Bye";
    }
}
$test = new Test;
echo "<br>";
echo "Menna";