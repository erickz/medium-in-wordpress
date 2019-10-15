<?php


require_once $pluginDir . 'src/switches/on.php';
require_once $pluginDir . 'src/switches/off.php';

use MediumInWp\Switches\On;
use MediumInWp\Switches\Off;

class PluginApp
{
    protected $name = '';
    protected $dir = '';
    protected $version = '1.0.0';
    protected $fileName = '';

    public function __construct($name, $dir, $version, $fileName)
    {
        $this->name = $name;
        $this->dir = $dir;
        $this->version = $version;
        $this->fileName = $fileName;

        $this->switch_on();
        $this->switch_off();
    }

    public function switch_on()
    {
        $on = new On($this->fileName);
        $on->register_in_wp();
    }

    public function switch_off()
    {
        $off = new Off($this->fileName);
        $off->register_in_wp();
    }

    public function declare_listeners()
    {

    }

    public function execute()
    {

    }
}



