<?php
/**
 * Theme functions.
 * 
 * @package zatheme * 
 */

// wp_enqueue_style(hook-handle, src, dependancy, version, media)
// get_template_directory().'/style.css') : gets the absolute path, not the uri
// fileemtime(get_template_directory().'/style.css') : gets the string timestamp everytime changes are made to the file
// media: all means all media wueries
// wp_enqueue_script(hook-handle, src, dependancy, version, infooter)
// if infooter is true, script loaded in footer
// registering before enqueueing is best practice. It is recommended. Enqueue can be added conditionally at 


function zatheme_add_theme_scripts() {

  wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime(get_template_directory().'/style.css'), 'all' ); // style sheet in zatheme registered
  wp_register_script( 'script-js', get_template_directory_uri().'/assets/main.js', [], filemtime(get_template_directory().'/assets/main.js'), true ); // scripts in zatheme registered

  wp_enqueue_style('style-css');// style sheet in zatheme added/enqueued
  wp_enqueue_script('script-js');// scripts in zatheme added/enqueued

}
add_action( 'wp_enqueue_scripts', 'zatheme_add_theme_scripts' );

?>