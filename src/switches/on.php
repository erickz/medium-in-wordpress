<?php

namespace MediumInWp\Switches;

/**
 * Fired when plugin is activated
 */

class On
{
    protected $mainClassFile = '';

    function __construct($mainClassFile)
    {
        $this->mainClassFile = $mainClassFile;
    }

    public function register_in_wp()
    {
        register_activation_hook( $this->mainClassFile, array('MediumInWp\Switches\On', 'activate') );
    }

    public static function activate()
    {
        var_dump("Teste");
    }
}