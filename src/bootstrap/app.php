<?php
// include the Composer autoload file
require $pluginDir . 'vendor/autoload.php';

use MediumInWp\Switchers\On;
use MediumInWp\Switchers\Off;

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

        //Register in WP the events when the plugin is activated and desactivated
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

    public function execute()
    {

    }
}



