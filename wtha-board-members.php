<?php
/*
    Plugin Name: Board Members Gallery
    Description: Adds Board Members CPT and shortcode for creating an employee profile gallery.  Usage instructions can be found in "Tools" menu.
    Version: 1.0.0
    Author: Kyle Merl
    Author URI: https://twinwebdev.com

*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'TWDBOARDMEMBERS_URL', plugin_dir_url(__FILE__) );

include( plugin_dir_path( __FILE__ )) . 'includes/board-members-styles.php';
include( plugin_dir_path( __FILE__ )) . 'includes/board-members-scripts.php';
include( plugin_dir_path( __FILE__ )) . 'includes/board-members-post-type.php';
include( plugin_dir_path( __FILE__ )) . 'includes/board-members-short-code.php';
include( plugin_dir_path( __FILE__ )) . 'includes/board-members-menu.php';