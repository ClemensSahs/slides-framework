<?php

function slidesDemoAutoloader ( $className ) {
    
    $fileName=$className;
    $filePath=DIR_SLIDES_LIB.$fileName.'.php';
    if ( file_exists($filePath) ) {
        include_once $filePath;
    }
}

spl_autoload_register ( slidesDemoAutoloader );