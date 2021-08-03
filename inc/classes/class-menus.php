<?php
/**
 * Register menus theme.
 *
 * @package zatheme
 */

namespace ZATHEME_THEME\Inc;

use ZATHEME_THEME\Inc\Traits\Singleton;

class Menus{
    use Singleton;


    protected function __construct(){

        // load class
        $this->set_hooks();
    }

    protected function set_hooks(){
       // all the actions and filters

       /**
        * Actions.
        */
       add_action( 'init', [$this, 'register_menus' ]); 

    }

    public function register_menus(){
      // register theme menus

         register_nav_menus(
           [
             'zatheme-header-menu' => esc_html__( 'Header Menu', 'zatheme' ),
             'zatheme-footer-menu' => esc_html__( 'Footer Menu', 'zatheme' )
           ]
          );
   }

   // get the id of the menu we specifically want to work with
   public function get_menu_id($menu_location){

      // get all menu locations
      $locations = get_nav_menu_locations();


      // get menu id
      $menu_id = $locations[$menu_location];

         // if it is empty, return nothing. Otherwise, return the id.
         return !empty($menu_id)? $menu_id:"";

   }

   public function get_child_menu($menu_array, $parent_id){
      // get the child menu within the main menu being looked at

      $child_menus = [];

      if(!empty($menu_array) && is_array($menu_array)){

         foreach($menu_array as $menu){

            // check if the parent id matches the menu items parent id
            // if they match, they will be gathered and pushed into child menu
            if(intval($menu->menu_item_parent) === $parent_id){
               array_push($child_menus, $menu);
            }
         }


      }

      return $child_menus;
   }

}