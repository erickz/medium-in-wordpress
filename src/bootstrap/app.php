<?php
// include the Composer autoload file
require $pluginDir . 'vendor/autoload.php';

use MediumInWp\Switchers\On;
use MediumInWp\Switchers\Off;

use MediumInWp\Registers\Actions;
use MediumInWp\Registers\Filters;

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
        $this->register_switch_on();
        $this->register_switch_off();
    }

    public function register_switch_on()
    {
        $on = new On($this->fileName);
        $on->register_in_wp();
    }

    public function register_switch_off()
    {
        $off = new Off($this->fileName);
        $off->register_in_wp();
    }

    public function addAndRunActions()
    {
        $actions = new Actions();

        //Add actions here

        $actions->run();
    }

    public function addAndRunFilters()
    {
        $filters = new Filters();

        //Add filters here

        $filters->run();
    }

    public function execute()
    {
        $this->addAndRunActions();
        $this->addAndRunFilters();
    }
}



