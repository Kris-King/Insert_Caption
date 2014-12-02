<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Flash
 *
 * @author kristopher.king
 */
class Flash {
    
    const FLASHES_KEY = '_flashes';
    
    private static function flashes(){
        
        $flashes = NULL;
        
    }
    
    private static function init(){
        
        if(self::$flashes!==null){
            
            return($flashes);
            
        }
        
        if(!array_key_exists(self::FLASHES_KEY,$_SESSION)){
            
            $_SESSION[self::FLASHES_KEY]=array();
            
        }
        
        self::$flashes=&$_SESSION[self::FLASHES_KEY];
        
    }
    
    public static function hasFlashes(){
        
        self::initFlashes;
        
        if(self::initFlashes>0){
            
            return count(self::$flashes);
            
        }
        
        
    }
    
    public static function getFlashes(){
        
        self::initFlashes;
        $copy =  self::$flashes;
        self::$flashes = array();
        return $copy;
        
    }
            
    
    public static function addFlash($message){
        
        if(!strlen(trim($message))){
            
            throw new Exception('Cannot insert empty flash message');
            
        }
        
        self::init;
        self::$flashes[] = $message;
        
    }
    
}
