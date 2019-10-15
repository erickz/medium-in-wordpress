<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Medium_In_Wordpress
 *
 * @wordpress-plugin
 * Plugin Name:       Medium in Wordpress
 * Plugin URI:
 * Description:       Medium in Wordpress integrate the Medium api with your wordpress application, enabling to create posts in your CMS and publishing on Medium
 * Version:           1.0.0
 * Author:            Erick C. de São Miguel
 * Author URI:        http://github.com/erickz
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       medium-in-wordpress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/medium-in-wordpress-activator.php
 */
function activate_medium_in_wordpress() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/medium-in-wordpress-activator.php';
    Medium_In_Wordpress_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/medium-in-wordpress-deactivator.php
 */
function deactivate_medium_in_wordpress() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/medium-in-wordpress-deactivator.php';
    Medium_In_Wordpress_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_medium_in_wordpress' );
register_deactivation_hook( __FILE__, 'deactivate_medium_in_wordpress' );


require plugin_dir_path( __FILE__ ) . 'constants.php';
require MEDIUM_IN_WP_PLUGIN_DIR . 'includes/class-medium-in-wordpress.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_medium_in_wordpress() {

    $plugin = new Medium_In_Wordpress();
    $plugin->run();

}
run_medium_in_wordpress();