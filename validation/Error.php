<?php

use FlightBookingValidator;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error
 *
 * @author kristopher.king
 */
class Error {
    
    private $source;
            
    private $message; 
    
    function __construct($source, $message) {
        $this->source = $source;
        $this->message = $message;
        
        $errors = FlightBookingValidator::validate($flightBooking);
        
    }
    
    public function getSource() {
        return $this->source;
    }

    public function getMessage() {
        return $this->message;
    }



    
}
