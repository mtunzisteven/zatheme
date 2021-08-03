<?php
/**
 * Enqueue theme.
 *
 * @package zatheme
 */

namespace ZATHEME_THEME\Inc;

use ZATHEME_THEME\Inc\Traits\Singleton;

class Assets{
    use Singleton;


    protected function __construct(){

        // load class
        $this->set_hooks();
    }

    protected function set_hooks(){
       // all the actions and filters

       /**
        * Actions.
        * hooked zatheme_add_theme_scripts to wp_enqueue_scripts action(hook)
        * to use add_action() inside a function, we have to use array method and then 
        * use $this, comma, and then the action/ name of the function
        */
       add_action( 'wp_enqueue_scripts', [$this, 'register_styles' ]); 
       add_action( 'wp_enqueue_scripts', [$this, 'register_scripts' ]); 

    }

    public function register_styles(){

       // register styles
       wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime(ZATHEME_DIR_PATH.'/style.css'), 'all' ); // style sheet in zatheme registered
       wp_register_style( 'bootstrap-css', ZATHEME_DIR_URI.'/assets/src/library/css/bootstrap.min.css', [], false, 'all' ); // bootstrap style sheet in zatheme registered

       // enqueue styles 
       wp_enqueue_style('style-css');// style sheet in zatheme added/enqueued
       wp_enqueue_style('bootstrap-css');// bootstrap sheet in zatheme added/enqueued

    }

    public function register_scripts(){

       // register scripts
       wp_register_script( 'script-js', ZATHEME_DIR_URI.'/assets/main.js', [], filemtime(ZATHEME_DIR_PATH.'/assets/main.js'), true ); // scripts in zatheme registered
       wp_register_script( 'bootstrap-js', ZATHEME_DIR_URI.'/assets/src/library/js/bootstrap.min.js', ['jquery'],false, true ); // bootstrap scripts in zatheme registered
       wp_register_script( 'fontawesome-js', 'https://kit.fontawesome.com/1276afdf97.js', [], false, 'all' ); // Font Awesome cdn in zatheme registered

       // enqueue scripts
       wp_enqueue_script('script-js');// scripts in zatheme added/enqueued
       wp_enqueue_script('bootstrap-js');// bootstrap scripts in zatheme added/enqueued
       wp_enqueue_script('fontawesome-js');// fontawesome scripts in zatheme added/enqueued

    }
}