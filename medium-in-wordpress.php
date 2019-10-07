<?php
/**
 *
 * @package Medium in Wordpress
 *
 * Plugin Name: Medium in Wordpress
 * Description: Medium in Wordpress integrate the Medium api with your wordpress application, enabling to create posts in your CMS and publishing on Medium
 * Version: 1.0.0
 * Author: Erick C. de São Miguel
 * License: GPL2
 *
 */

defined('ABSPATH') or die('You can`t access this plugin if wordpress is not initialized');

define( 'MEDIUM_IN_WP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MEDIUM_IN_WP_API_URL', 'https://api.medium.com/v1/' );
define( 'MEDIUM_IN_WP_PREFIX', 'medium_in_wp_' );

require_once( MEDIUM_IN_WP_PLUGIN_DIR . 'medium-in-wordpress-class.php' );
require_once( MEDIUM_IN_WP_PLUGIN_DIR . 'medium-in-wordpress-settings-page.php' );
