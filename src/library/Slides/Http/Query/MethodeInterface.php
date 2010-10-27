<?php

namespace Slides\Http\Query;


interface MethodeInterface {
    public function getParam ( $name );
    public function issetParam($name);
}