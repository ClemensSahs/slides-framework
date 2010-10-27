<?php

namespace Slides;

abstract class Singleton
{
    protected static $_instances = array();

    final protected function __construct()
    {
    }

    final public function __clone()
    {
        throw new Exception('This singleton must not be cloned.');
    }
    
    final public static function getInstance()
    {
        $className = get_called_class();
        if ( empty(self::$_instances[$class]) ) {
            self::$_instances[$class] = new $className ();
            call_user_func_array( array( self::$_instances[$class] , '_construct' ), func_get_args() );
        }
        return self::$_instances[$class];
    }
    
    
}