<?php

namespace Slides\DataMapper\DataObject;

abstract class AbstractDataObject
    implements DataObjectInterface {
    
    abstract public function get($propertyName);
}