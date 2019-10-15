<?php

namespace MediumInWp\Registers;

trait hookTraits
{
    public function addHook($hooks = array(), $hook = '', $component = '', $callback = '', $priority = '', $accepted_args = '')
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

    public function runHooks($hooks = array(), $type = 'action')
    {
        if(! $type){
            return;
        }

        if ($type !== 'action' && $type !== 'filter'){
            return;
        }

        foreach($hooks as $hook){
            call_user_func('add_' . $type, $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args']);
        }
    }
}