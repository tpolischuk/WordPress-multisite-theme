<?php

/**
 *
 *  hw_do_user_nav()
 *
 *  Switches the menu based on the user role privs
 *
 *  @author: Adam LaBarge
 *  @date: 09/2014
 *  @version: 1.0.0
 *  @package: Hennessey Wellness
 */
add_action( 'genesis_header_right', 'hw_do_user_nav' );
function hw_do_user_nav() {
	
	$user_role = hw_get_user_role();

	switch ($user_role) {

		case "prospect":
			wp_nav_menu(array(
				'menu' 				=> 'Prospect',
				'container' 		=> 'nav',
				'container_class' 	=> 'nav-primary',
				'menu_class' 		=> 'menu genesis-nav-menu menu-primary',
				'menu_id' 			=> 'navigation',
				'items_wrap'      	=> '<div class="wrap"><ul id="%1$s" class="%2$s">%3$s</ul></div>',
			));
			break;

		case "client":
			wp_nav_menu(array(
				'menu' 				=> 'Client',
				'container' 		=> 'nav',
				'container_class' 	=> 'nav-primary',
				'menu_class' 		=> 'menu genesis-nav-menu menu-primary',
				'menu_id' 			=> 'navigation',
				'items_wrap'      	=> '<div class="wrap"><ul id="%1$s" class="%2$s">%3$s</ul></div>',
			));
			break;
/* // currently no Admin menu
		case "administrator":
			wp_nav_menu(array(
				'menu' 				=> 'Admin',
				'container' 		=> 'nav',
				'container_class' 	=> 'nav-primary',
				'menu_class' 		=> 'menu genesis-nav-menu menu-primary',
				'menu_id' 			=> 'navigation',
				'items_wrap'      	=> '<div class="wrap"><ul id="%1$s" class="%2$s">%3$s</ul></div>',
				'link_after'		=> '',
				'link_before'		=> '',
				'before'			=> '',
				'after'				=> '',
			));
			break;
*/
		default:
            wp_nav_menu(array(
				'menu' 				=> 'No Login',
				'container' 		=> 'nav',
				'container_class' 	=> 'nav-primary',
				'menu_class' 		=> 'menu genesis-nav-menu menu-primary',
				'menu_id' 			=> 'navigation',
				'items_wrap'      	=> '<div class="wrap"><ul id="%1$s" class="%2$s">%3$s</ul></div>',
				'link_after'		=> '',
				'link_before'		=> '',
				'before'			=> '',
				'after'				=> '',
			));
			break;
	}
}