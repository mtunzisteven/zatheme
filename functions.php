<?php
/**
 * Theme functions.
 * 
 * @package zatheme * 
 */

 if(!defined('ZATHEME_DIR_PATH')){ //if the global variable if not defined we'll define it below

    define('ZATHEME_DIR_PATH', untrailingslashit(get_template_directory())); 
    // get_template_directory() gets the path up until the root of the theme
    // untrailingslashit removes trailing slashes if they exist in the path

 }

 if(!defined('ZATHEME_DIR_URI')){ //if the global variable if not defined we'll define it below

  define('ZATHEME_DIR_URI', untrailingslashit(get_template_directory_uri())); 
  // get_template_directory_uri() gets the uri 
  // untrailingslashit removes trailing slashes if they exist in the path

}

 require_once ZATHEME_DIR_PATH . '/Inc/Helpers/autoloader.php'; // this has the logic to load the classes, blocks and widgets

 function zatheme_get_theme_instance(){

  \ZATHEME_THEME\Inc\ZATHEME_THEME::get_instance(); // calling singleton trait in trait-singleton to instantiate ZATHEME_THEME from class-zatheme-theme.php.

 }

 zatheme_get_theme_instance(); // call above function



?>