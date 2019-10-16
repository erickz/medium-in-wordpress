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
    protected $name;
    protected $dir;
    protected $version;
    protected $pluginMainFile;
    protected $actions;
    protected $filters;
    protected $modulesList;
    protected $loadedModules;

    public function __construct($name = '', $dir = '', $version = '1.0.0', $pluginMainFile = '', $modulesList = array())
    {
        $this->name = $name;
        $this->dir = $dir;
        $this->version = $version;
        $this->pluginMainFile = $pluginMainFile;
        $this->modulesList = $modulesList;

        if (is_admin()){
            //Register in WP the events when the plugin is activated and desactivated
            $this->register_switch_on();
            $this->register_switch_off();
        }

        //Instantiate filters and actions
        $this->actions = new Actions();
        $this->filters = new Filters();
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

    public function loadModules()
    {
        foreach ($this->modulesList as $module)
        {
            $file = $module . '.php';
            $fullPath = $this->dir . $module . '/' . $file;

            if ( file_exists( $fullPath) ) {
                require_once $fullPath;

                $this->loadedModules[] = $module;
            }
        }
    }

    public function instantiateModules()
    {

    }

    public function runActions()
    {
        $this->actions->run();
    }

    public function runFilters()
    {
        $this->filters->run();
    }

    public function execute()
    {
        //$this->loadLanguages();

        $this->loadModules();

//        $this->instantiateModules();

        $this->runActions();
        $this->runFilters();
    }
}



