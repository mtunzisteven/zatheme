<?php
/**
 * Singleton file for theme.
 *
 * @package zatheme
 */

 namespace ZATHEME_THEME\Inc\Traits;

 trait Singleton{

    public function __construct(){

    }

    public function __clone(){

    }

    final public static function get_instance(){

        static $instance = []; //  holds instance of the class

        $called_class = get_called_class(); // returns the called class

        if(!isset($instance[$called_class])){ // if an instance of the class has not bee created as yet, go on and create it

            $instance[$called_class] = new $called_class; // use the called class to actually instantiate it.

            do_action(sprintf('zatheme_theme_singleton_init%s', $called_class)); // incase any pluggin wants to hook into this point. This registers an action.


        }

        return $instance[$called_class];
    }
 }