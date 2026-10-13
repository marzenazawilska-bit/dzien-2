<?php

$array= [
    'To ja',
    'twój komputer'
];

foreach($array as $item){
    echo 'Wartość $item: '.$item.PHP_EOL;
}

foreach($array as $key => $value){
    echo "Wartość\$item w kolejności $key: ".$value.PHP_EOL;
}

echo "JUż poza pętlą";