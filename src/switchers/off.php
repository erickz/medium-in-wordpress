<?php

namespace MediumInWp\Switchers;

/**
 * Fired when plugin is deactivated
 */

class Off
{
    protected $fileName = '';

    function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function register_in_wp()
    {
        register_deactivation_hook( $this->fileName, array('MediumInWp\Switchers\Off', 'deactivate'));
    }

    public static function deactivate()
    {
        var_dump("desativou");
    }
}