<?php

namespace Jamshid\LaravelTransit\Services\ProduceService;

class Produce
{

    public function send($class)
    {
        return (new $class);
    }
}