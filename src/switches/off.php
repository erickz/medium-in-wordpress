<?php

namespace MediumInWp\Switches;

/**
 * Fired when plugin is deactivated
 */

class Off
{
    /**
     *
     */
    protected $mainClassFile = '';

    function __construct($mainClassFile)
    {
        $this->mainClassFile = $mainClassFile;
    }

    public function register_in_wp()
    {
        register_deactivation_hook( $this->mainClassFile, array('MediumInWp\Switchers\Off', 'deactivate'));
    }

    public static function deactivate()
    {
        var_dump("desativou");
    }
}