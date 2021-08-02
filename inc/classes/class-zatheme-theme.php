<?php
/**
 * Bootstraps the theme.
 *
 * @package zatheme
 */

namespace ZATHEME_THEME\Inc;

use ZATHEME_THEME\Inc\Traits\Singleton; //imports the singleton trait with namespace into this file for use in the class

class ZATHEME_THEME{

     use Singleton; //imports the singleton trait into this class and causes the use on ln10 to auto populate

     protected function __construct(){

         // load all of the different classes
        $this->set_hooks();
     }

     protected function set_hooks(){
         // all the actions and filters
     }
 }