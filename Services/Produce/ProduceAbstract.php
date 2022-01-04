<?php

namespace LaravelTransit\Services\Produce;

class ProduceAbstract
{
    protected $message;
    protected $queue;
    protected $exchange;
    protected $routingKey;

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setQueue($queue)
    {
        $this->queue = $queue;
        return $this;
    }

    public function getQueue()
    {
        return $this->queue;
    }

    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
        return $this;
    }

    public function getExchange()
    {
        return $this->exchange ?? $this->queue;
    }

    public function setRoutingKey($routingKey)
    {
        $this->routingKey = $routingKey;
        return $this;
    }

    public function getRoutingKey()
    {
        return $this->routingKey;
    }
}