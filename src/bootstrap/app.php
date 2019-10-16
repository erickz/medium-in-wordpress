<?php
// include the Composer autoload file
require $pluginDir . 'vendor/autoload.php';

use MediumInWp\Switches\On;
use MediumInWp\Switches\Off;

use MediumInWp\Lang\i18n;

use MediumInWp\Registers\Actions;
use MediumInWp\Registers\Filters;

class PluginApp
{
    protected $name = '';
    protected $dir = '';
    protected $version = '1.0.0';
    protected $pluginMainFile = '';

    public function __construct($name, $dir, $version, $pluginMainFile)
    {
        $this->name = $name;
        $this->dir = $dir;
        $this->version = $version;
        $this->pluginMainFile = $pluginMainFile;

        //Register in WP the events when the plugin is activated and desactivated
        $this->register_switch_on();
        $this->register_switch_off();
    }

    public function register_switch_on()
    {
        $on = new On($this->pluginMainFile);
        $on->register_in_wp();
    }

    public function register_switch_off()
    {
        $off = new Off($this->pluginMainFile);
        $off->register_in_wp();
    }

    public function loadLanguages()
    {
        $lang = new i18n();
        $lang->load($this->name, $this->dir);
    }

    public function runActions()
    {
        $actions = new Actions();

        $actions->run();
    }

    public function runFilters()
    {
        $filters = new Filters();

        $filters->run();
    }

    public function execute()
    {
        //$this->loadLanguages();

        $this->runActions();
        $this->runFilters();
    }
}



