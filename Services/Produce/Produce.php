<?php

namespace LaravelTransit\Services\Produce;

class Produce
{

    public function send($class)
    {
        return (new $class);
    }
}