<?php 
class Person {
    protected $age;
    public function __construct($age){
        $this->age=$age;
    }
    public function getAge(){
        return $this->age;
    }
}
$kazik =new Person(13);
echo "Kazik ma lat: ".$kazik->getAge();