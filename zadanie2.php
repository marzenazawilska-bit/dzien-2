<?php

$i=readline("Wybierz figurę której chcesz obliczyc objętość: \n1. Sześcian \n2. Prostopadłościan \n3. Graniastosłup \n4. Walec \n5. Ostrosłup \n6. Stożek \n7. Kula");

switch($i){
    case 1:
        $a=readline("Podaj długość krawędzi sześcianu: ");
        $obj = $a**3;
        echo "Objętość twojego sześcianu to: " . $obj . PHP_EOL;
        break;
    case 2:
        $a=readline("Podaj długość pierwszej krawędzi prostopadłościanu ");
        $b=readline("Podaj długość drugiej krawędzi prostopadłościanu ");
        $c=readline("Podaj długość trzeciej krawędzi prostopadłościanu ");
        $obj = $a*$b*$c;
        echo "Objętość twojego prostopadłościanu to: " . $obj . PHP_EOL;
        break;
    case 3:
        $a=readline("Podaj ple podstawy graniastosłupa: ");
        $h=readline("Podaj wysokość graniastosłupa: ");
        $obj = $a*$h;
        echo "Objętość twojego graniastosłupa to: " . $obj . PHP_EOL;
        break;
    case 4:
        $a=readline("Podaj długość promienia podstawy walca: ");
        $b=readline("Podaj wysokość walca: ");
        $obj = $a**2*3.14*$b;
        echo "Objętość twojego walca to: " . $obj . PHP_EOL;
        break;
    case 5:
        $b=readline("Podaj pole podstawy ostrosłupa: ");
        $c=readline("Podaj wysokość ostrosłupu: ");
        $obj = 1/3*$b*$c;
        echo "Objętość twojego ostrosłup to: " . $obj . PHP_EOL;
        break;
    case 6:
        $a=readline("Podaj długość promienia podstawwy stożka: ");
        $b=readline("Podaj wysokość: ");
        $obj = $a**2*$b*1/3*3.14;
        echo "Objętość twojego stożka to: " . $obj . PHP_EOL;
        break;
    case 7:
        $a=readline("Podaj promień kuli: ");
        $obj = 4/3*3.14*$a**3;
        echo "Objętość twojego kula to: " . $obj . PHP_EOL;
        break;
    default: 
    echo "Żaden z warunków nie został spełniony";
}