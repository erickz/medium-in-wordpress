<?php

namespace MediumInWp\Switchers;

/**
 * Fired when plugin is activated
 */

class On
{
    protected $fileName = '';

    function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function register_in_wp()
    {
        register_activation_hook( $this->fileName, array('MediumInWp\Switchers\On', 'activate') );
    }

    public static function activate()
    {
        var_dump("Teste");
    }
}