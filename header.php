<?php
/**
 * Theme header template.
 * 
 * @package zatheme * 
 */

 ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head();// to load wp styles and scripts ?>
    </head>
    <body    <?php body_class();// used to add classes to the body tag. Custom classes can be added as arguments ?>  >

        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php 

            if(function_exists('wp_body_open')){ // 5.2 or later WP versions | facilitating backward compatibility

                wp_body_open();// used to inject scripts in body, before content is displayed 

            }
        ?>

    <div id='page' class='site'>

        <header id='masthead' class='site-header' role='banner'>

            <?php get_template_part('/template-parts/header/nav');  // fetches a templte the same way as include for snippets.  ?>
        
        </header>

        <div id='content' class='site-content'>