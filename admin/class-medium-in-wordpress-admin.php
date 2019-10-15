<?php

require MEDIUM_IN_WP_PLUGIN_DIR . 'extendables/class-medium-in-wordpress-admin.php';

class Medium_In_Wordpress_Admin extends Medium_In_Wordpress_Admin_Base
{
    public function __construct($plugin_name, $version)
    {
        parent::__construct($plugin_name, $version);
    }
}