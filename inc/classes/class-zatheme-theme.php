<?php
/**
 * Bootstraps the theme.
 *
 * @package zatheme
 */

// wp_enqueue_style(hook-handle, src, dependancy, version, media)
// ZATHEME_DIR_PATH.'/style.css') : gets the absolute path, not the uri
// fileemtime(ZATHEME_DIR_PATH.'/style.css') : gets the string timestamp everytime changes are made to the file
// media: all means all media wueries
// wp_enqueue_script(hook-handle, src, dependancy, version, infooter)
// if infooter is true, script loaded in footer
// registering before enqueueing is best practice. It is recommended. Enqueue can be added conditionally at 
// only the following bootstrap files needed: /assets/src/library/css/bootstrap.min.css and /assets/src/library/js/bootstrap.min.css
// for bootstrap css, there are no dependancies or version requires. Set to ...[], false...
// for bootstrap js,  there is a JQuery dependancy but no version number. Set to ...['jquery'], false...
// WP comes with jquery out of the box. No need to register and enqueue

namespace ZATHEME_THEME\Inc;

use ZATHEME_THEME\Inc\Traits\Singleton; //imports the singleton trait with namespace into this file for use in the class

class ZATHEME_THEME{

     use Singleton; //imports the singleton trait into this class and causes the use on ln10 to auto populate

     protected function __construct(){

        // load all of the different classes
        Assets::get_instance();
        Menus::get_instance();
        $this->set_hooks();
     }

     protected function set_hooks(){
        // all the actions and filters

        add_action('after_setup_theme', [$this, 'setup_theme']);
     }

     public function setup_theme(){
        // WP will manage the title tag
        // Adds ability to edit in customizer
        add_theme_support( 'title-tag' ); 

        // add ability to add custom logo
        // Adds ability to edit in customizer
        add_theme_support( 'custom-logo', array(
            'header-text'          => array( 'site-title', 'site-description' ),
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true,
        ) );

        // allows us to customize the background
        add_theme_support( 'custom-background', $defaults = [
                'default-image'          => '',
                'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
                'default-position-x'     => 'left',    // 'left', 'center', 'right'
                'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
                'default-size'           => 'auto',    // 'auto', 'contain', 'cover'
                'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
                'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
                'default-color'          => 'ffffff',
                'wp-head-callback'       => '_custom_background_cb',
                'admin-head-callback'    => '',
                'admin-preview-callback' => '',
            
         ] );

         // add thumbnail for posts
         add_theme_support( 'post-thumbnails' );

         // add refresh for only those parts that were changed
         add_theme_support( 'customize-selective-refresh-widgets' );

         add_theme_support( 'automatic-feed-links' );

         // add html5 theme support
         add_theme_support( 
             'html5', 
             [
                'comment-list', 
                'comment-form', 
                'search-form', 
                'gallery', 
                'caption', 
                'style', 
                'script' 

            ] 
        );

        add_editor_style();

        // due to gutenberg. WP will not automatically add styling to front end 
        // because it may cause conflicts. This adds those styles for front-end 
        add_theme_support( 'wp-block-styles' );

        // support for gutenberg alignment adding wide width ad full width for blocks
        add_theme_support( 'align-wide' );

        // setting content width of the site

        global $content_width;
        if(!isset($content_width)){

            $content_width = 1240; //sets the maximum allowable width for anything on front end.

        }

     }

 }