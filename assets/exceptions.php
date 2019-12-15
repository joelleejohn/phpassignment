<?php 
namespace MPloyEZ;

use Exception;

// This class exists for the sake of error handling.
// It allows checking if the exception is a built-in exception 
// or an application specific one.
/** 
 * Extends Exception for custom error handling
*/
class MPEZException extends Exception {
    public function __construct($message){
        parent::__construct($message);
    }
}

// 
/**
 * A class for handling TaxBracket exceptions
 */
class TaxBracketException extends MPEZException {
    public function __construct($message){
        parent::__construct($message);
    }
}
/**
 * A class for handling TaxCalculator exceptions
 */
class TaxCalculatorException extends MPEZException {
    public function __construct($message){
        parent::__construct($message);
    }
}





?>