<?php

namespace MediumInWp\Loaders;

use MediumInWp\App\Helpers\Globals\Strings;

class Modules
{
    protected $baseDir;
    protected $modules;
    protected $loadedModules;

    public function __construct($baseDir = '', $modules = array())
    {
        $this->baseDir = $baseDir;
        $this->modules = $modules;

        $this->load();
    }

    public function load()
    {
        foreach ($this->modules as $module)
        {
            $moduleName = $module['name'];
            $file = $moduleName . '.php';
            $fullPath = $this->baseDir . 'src/app/modules/' . $moduleName . '/' . $file;

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
            $baseNamespace = '\MediumInWp\App\Modules\\';
            $className = Strings::fromSnakeToCamel($module);
            $class = $baseNamespace . $className;

            if (class_exists($class)){
                new $class($this->actions, $this->filters);

                $instantiateds[] = $className;
            }
        }

        return $instantiateds;
    }

    public function run()
    {
        return $this->instantiate();
    }
}