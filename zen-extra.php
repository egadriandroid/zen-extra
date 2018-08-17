<?php
/*
Plugin Name: ZEN Extra
Plugin URI:  https://zenzro.id
Description: ZEN Extra Functionality
Version:     1.2
Author:      Ega Adrian
Author URI:  https://egadriandroid
License:     GPL2 etc
License URI: https://zenzroid.com
*/


/*************** start add chat support ***************/
// Register Script Head
function custom_admin_js() {
    $url = get_bloginfo('template_directory') . '/js/wp-admin.js';
    echo '<script src="https://app.chaport.com/javascripts/insert.js" async></script>';
}
add_action('admin_head', 'custom_admin_js');

// Register Script
function zen_freshchat_scripts() {
	wp_register_script( 'admin_custom_js', plugins_url( 'scripts/chaport.js', __FILE__ ) , array( 'jquery' ), '1', true );
	wp_enqueue_script( 'admin_custom_js' );

}

// Hook into the 'admin_enqueue_scripts' action
add_action( 'admin_enqueue_scripts', 'zen_freshchat_scripts' );

/*************** end add chat support ***************/

/*************** start remove yith license notice ***************/
function yith_remove_notice ($show_license_notice)
{
  return false;
}
add_filter ('yith_plugin_fw_show_activate_license_notice', 'yith_remove_notice', 99999999999999999, 1);

/*************** end remove yith license notice ***************/