<?php

interface curlBuilderInterface
{
    public function init();
    public function close($curl);
    public function build();
    public function execute();
    public function response($output);
}