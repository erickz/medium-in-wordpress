<?php

namespace MediumInWp\Loaders;

use MediumInWp\App\Helpers\Globals\Strings;

class Modules
{
    protected $modules;
    protected $loadedModules;

    public function __construct($modules = array())
    {
        $this->modules = $modules;

        $this->load();
    }

    public function load()
    {
        foreach ($this->modules as $module)
        {
            $moduleName = $module['name'];
            $file = $moduleName . '.php';
            $fullPath = $this->dir . 'src/app/modules/' . $moduleName . '/' . $file;

            if(isset($module['priority'])){
                $priority = $module['priority'];

                if ($priority == 'admin' && ! is_admin()){
                    continue;
                }
            }

            if ( file_exists( $fullPath ) ) {
                require_once $fullPath;

                $this->loadedModules[] = $moduleName;
            }
        }
    }

    public function instantiate()
    {
        $instantiateds = [];

        foreach($this->loadedModules as $module){
            $className = Strings::fromSnakeToCamel($module);

            if (class_exists($className)){
                $instantiateds[] =  new $className($this->actions, $this->filters);
            }
        }

        return $instantiateds;
    }

    public function run()
    {
        return $this->instantiate();
    }
}