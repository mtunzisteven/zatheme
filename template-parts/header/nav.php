<?php
/**
 * Theme navigation template.
 * 
 * @package zatheme * 
 */

  $nav_menu_class = \ZATHEME_THEME\Inc\Menus::get_instance(); // call menus class and instantiate it.
  $header_menu_id = $nav_menu_class->get_menu_id('zatheme-header-menu'); // store id in variable

  // fetch the menu by id and get all its information
  $header_menus = wp_get_nav_menu_items($header_menu_id);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <?php

    if(function_exists('the_custom_logo')){

      the_custom_logo();

    }

  ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <?php

      if(!empty($header_menus) && is_array($header_menus)){

        ?>

          <ul class="navbar-nav mr-auto">

            <?php

              foreach($header_menus as $menu_item){

                if(!$menu_item->menu_item_parent){

                  $child_menu_items = $nav_menu_class->get_child_menu($header_menus, $menu_item->ID); // array of child menus with same parent ids

                  $has_children = !empty($child_menu_items) && is_array($child_menu_items); // if it aint empty and is an array it is a parent

                  if(!$has_children){
                  ?>

                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo esc_url($menu_item->url); ?>"><?php echo esc_html($menu_item->title); ?> 5555</a>
                    </li>

                  <?php

                }else{
                  ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url); ?>" id="<?php echo $menu_item->ID; ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo esc_html($menu_item->title); ?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                      <?php

                        foreach($child_menu_items as $child_menu_item){

                          ?>

                          <a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url); ?>"><?php echo esc_html($child_menu_item->title); ?></a>

                          <?php

                        }

                        ?>

                        </div>
                        
                    </li>

                    <?php

                  }

                }

              }

            ?>

          </ul>

        <?php

      }

    ?>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
