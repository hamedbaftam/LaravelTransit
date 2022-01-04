<?php

class Produce
{
    protected $message;
    protected $queue;
    protected $exchange;
    protected $routingKey;

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setQueue($queue)
    {
        $this->queue = $queue;
    }

    public function getQueue()
    {
        return $this->queue;
    }

    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
    }

    public function getExchange()
    {
        return $this->exchange ?? $this->queue;
    }

    public function setRoutingKey($routingKey)
    {
        $this->routingKey = $routingKey;
    }

    public function getRoutingKey()
    {
        return $this->routingKey;
    }

    public function send($class)
    {
        return (new $class)->produce($this->getMessage(), $this->getQueue(), $this->getExchange(), $this->getRoutingKey());
    }
}