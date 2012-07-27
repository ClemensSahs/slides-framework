<?php

namespace Slides\DataMapper\Finder;

/**
 * 
 * @property $OR
 * @property $AND
 * 
 * Enter description here ...
 * @author c.sahs
 *
 */
class Where {
    /**
	* Overloading
	*
	* Overloads "or", "and", "nest", and "unnest"
	*
	*/
	    public function __get($name)
	    {
	        switch (strtolower($name)) {
	            case 'or':
	                $this->nextPredicateCombineOperator = self::OP_OR;
	                break;
	            case 'and':
	                $this->nextPredicateCombineOperator = self::OP_AND;
	                break;
	            case 'nest':
	                return $this->nest();
	            case 'unnest':
	                return $this->unnest();
	        }
	        return $this;
	    }
	/**
	 * 
	 * @return \Slides\DataMapper\Finder\Where
	 */
	public function getRowSet () {
		
	}
	/**
	 * 
	 * @return \Slides\DataMapper\Finder\Where
	 */
	public function equal() {
		
	}
	/**
	 * 
	 * @return \Slides\DataMapper\Finder\Where
	 */
	public function in() {
		
	}
	/**
	 * 
	 * @return \Slides\DataMapper\Finder\Where
	 */
	public function upper() {
		
	}
	/**
	 * 
	 * @return \Slides\DataMapper\Finder\Where
	 */
	public function lower() {
		
	}
	/**
	 * 
	 * @return \Slides\DataMapper\Finder\Where
	 */
	public function between() {
		
	}
}