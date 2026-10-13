<?php

function randomString($bytesLength=32){
    $bytes = random_bytes($bytesLength);
    $string = bin2hex($bytes);
    return $string;
}

echo randomString(2).PHP_EOL;