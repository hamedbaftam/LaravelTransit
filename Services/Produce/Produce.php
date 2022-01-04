<?php

namespace LaravelTransit\Services\Produce;

class Produce
{





    public function setProducerClass($class)
    {

    }

    public function send($class)
    {
        return (new $class)->produce($this->getMessage(), $this->getQueue(), $this->getExchange(), $this->getRoutingKey());
    }
}