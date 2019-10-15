<?php

namespace MediumInWp\Registers;

trait hookTraits
{
    protected function addHook($hooks = array(), $hook = '', $component = '', $callback = '', $priority = '', $accepted_args = '')
    {
        $hooks[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args
        );

        return $hooks;
    }
}