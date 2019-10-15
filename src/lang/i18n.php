<?php

namespace MediumInWp\Lang;

class i18n
{
    /**
     * Load the plugin text domain for translation.
     */
    public function load() {

        load_plugin_textdomain(
            'plugin-name',
            false,
            MEDIUM_IN_WP_PLUGIN_DIR . 'src/app/languages'
        );

    }
}