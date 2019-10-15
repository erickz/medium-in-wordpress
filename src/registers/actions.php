<?php

namespace MediumInWp\Registers;

use MediumInWp\Registers\hookTraits;

class Actions
{
    protected $actions;

    use hookTraits;

    public function __construct()
    {
        $this->actions = array();
    }

    public function add($hook, $component, $callback, $priority, $accepted_args)
    {
        $this->addHook($this->actions, $hook, $component, $callback, $priority, $accepted_args);
    }

    public function run()
    {

    }
}