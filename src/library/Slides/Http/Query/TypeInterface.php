<?php

namespace Slides\Http\Query;


interface TypeInterface {
    public function isValid ( $data );
    public function parse ( $data );
    
}