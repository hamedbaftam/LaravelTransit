<?php

namespace LarvelTransit\Services\ProduceService;

class Produce
{

    public function send($class)
    {
        return (new $class);
    }
}