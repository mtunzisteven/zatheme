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

 require_once ZATHEME_DIR_PATH . '/Inc/Helpers/autoloader.php'; // this has the logic to load the classes, blocks and widgets

 function zatheme_get_theme_instance(){

  \ZATHEME_THEME\Inc\ZATHEME_THEME::get_instance(); // calling singleton trait in trait-singleton to instantiate ZATHEME_THEME from class-zatheme-theme.php.

 }

 zatheme_get_theme_instance(); // call above function

// wp_enqueue_style(hook-handle, src, dependancy, version, media)
// get_template_directory().'/style.css') : gets the absolute path, not the uri
// fileemtime(get_template_directory().'/style.css') : gets the string timestamp everytime changes are made to the file
// media: all means all media wueries
// wp_enqueue_script(hook-handle, src, dependancy, version, infooter)
// if infooter is true, script loaded in footer
// registering before enqueueing is best practice. It is recommended. Enqueue can be added conditionally at 
// only the following bootstrap files needed: /assets/src/library/css/bootstrap.min.css and /assets/src/library/js/bootstrap.min.css
// for bootstrap css, there are no dependancies or version requires. Set to ...[], false...
// for bootstrap js,  there is a JQuery dependancy but no version number. Set to ...['jquery'], false...
// WP comes with jquery out of the box. No need to register and enqueue

function zatheme_add_theme_scripts() {

  // register styles
  wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime(get_template_directory().'/style.css'), 'all' ); // style sheet in zatheme registered
  wp_register_style( 'bootstrap-css', get_template_directory_uri().'/assets/src/library/css/bootstrap.min.css', [], false, 'all' ); // bootstrap style sheet in zatheme registered

  // register scripts
  wp_register_script( 'script-js', get_template_directory_uri().'/assets/main.js', [], filemtime(get_template_directory().'/assets/main.js'), true ); // scripts in zatheme registered
  wp_register_script( 'bootstrap-js', get_template_directory_uri().'/assets/src/library/js/bootstrap.min.js', ['jquery'],false, true ); // bootstrap scripts in zatheme registered
  wp_register_script( 'fontawesome-js', 'https://kit.fontawesome.com/1276afdf97.js', [], false, 'all' ); // Font Awesome cdn in zatheme registered


  // enqueue styles 
  wp_enqueue_style('style-css');// style sheet in zatheme added/enqueued
  wp_enqueue_style('bootstrap-css');// bootstrap sheet in zatheme added/enqueued

  // enqueue scripts
  wp_enqueue_script('script-js');// scripts in zatheme added/enqueued
  wp_enqueue_script('bootstrap-js');// bootstrap scripts in zatheme added/enqueued
  wp_enqueue_script('fontawesome-js');// fontawesome scripts in zatheme added/enqueued

}
add_action( 'wp_enqueue_scripts', 'zatheme_add_theme_scripts' ); // hooked zatheme_add_theme_scripts to wp_enqueue_scripts action(hook)

?>