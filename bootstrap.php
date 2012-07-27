<?php

function __autoload ($class) {
    $classParts = explode( '\\', $class);
    
    $filePath = __DIR__ . '/../../';
    
    foreach ( $classParts as $part ) {
        
    }
}