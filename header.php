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
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WordPress Theme</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head();// to load wp styles and scripts ?>
    </head>
    <body    <?php body_class();// used to add classes to the body tag. Custom classes can be added as arguments ?>
    >
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php wp_body_open();// used to inject scripts in body, before content is displayed ?>

    <header>Header</header>