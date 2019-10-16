<?php

namespace MediumInWp\Modules;

class SettingsPage
{
    public function requestTokenPage()
    {
        add_action('admin_menu', 'set_up_medium_in_wp_menu');

        function set_up_medium_in_wp_menu(){
            add_menu_page( 'Medium in Wordpress',
                'Medium in WP Settings',
                'manage_options',
                'medium_in_wordpress',
                'medium_in_wordpress_menu' );
        }

        function medium_in_wordpress_menu(){

            ?>

            <h1>Medium in Wordpress Settings</h1>

            <?php

        }
    }
}