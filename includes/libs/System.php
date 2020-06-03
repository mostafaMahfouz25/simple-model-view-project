<?php 

/**
 * 
 * 
 * registery design pattern 
 * 
 */


 class System 
 {
    private static $objects = [];

    /**
     * 
     * @param index for key of array
     * @param val => instance of class 
     */
    public Static function store($index,$val)
    {
        self::$objects[$index] = $val;
    }

    /**
     * @param index =>to get the object automaticly 
     */
    public static function get($index)
    {
        return self::$objects[$index];
    }
 }