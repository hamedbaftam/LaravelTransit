<?php

namespace Jamshid\LaravelTransit\Services\ProduceService;

class Transit
{

    public function init($class)
    {
        return (new $class);
    }
}