<?php

function __autoload ($class) {
    $classParts = explode( '\\', $class);

    $filePath = __DIR__ . '\..\library';
    $filePath = realpath ( $filePath ) . '/' . implode( '/', $classParts ) . '.php';

    if ( file_exists( $filePath ) ) {
        require_once $filePath;
    } else {
        return false;
    }
}