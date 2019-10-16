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
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

$yourPluginName = 'Medium In WP';
$pluginVersion = '1.0.0';
$modulesToLoad = [
    ['name' => 'medium-api'],
    ['name' => 'settings-pages'],
    ['name' => 'sync-posts']
];


$pluginDir = plugin_dir_path( __FILE__ );
$pluginMainFile = __FILE__;

require $pluginDir . 'src/bootstrap/app.php';

$pluginApp = new PluginApp($yourPluginName, $pluginDir, $pluginVersion, $pluginMainFile, $modulesToLoad);
$pluginApp->execute();

unset($yourPluginName, $pluginDir, $pluginVersion, $pluginFile);
