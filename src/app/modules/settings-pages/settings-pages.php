<?php

namespace MediumInWp\App\Modules;

use MediumInWp\Loaders\Views;

class SettingsPages
{
    /**
     * SettingsPage constructor.
     * @param \MediumInWp\Registers\Actions $actions
     * @param \MediumInWp\Registers\Filters $filters
     */
    public function __construct($actions, $filters)
    {
        $actions->add('admin_menu', array($this, 'addMenu'));
    }

    public function addMenu()
    {
        add_menu_page( 'Medium in Wordpress',
            'Medium in WP Settings',
            'manage_options',
            'medium_in_wordpress',
            array($this, 'settingsPage'));
    }

    public function settingsPage()
    {
        return Views::load(plugin_dir_path( __FILE__ ) . 'templates/settings-view.php');
    }
}