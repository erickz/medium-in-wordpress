<?php

namespace MediumInWp\Registers;

use MediumInWp\Registers\hookTraits;

class Filters
{
    protected $filters;

    use hookTraits;

    public function __construct()
    {
        $this->filters = array();
    }

    public function add($hook, $component, $callback, $priority, $accepted_args)
    {
        $this->addHook($this->filters, $hook, $component, $callback, $priority, $accepted_args);
    }

    public function run()
    {

    }
}