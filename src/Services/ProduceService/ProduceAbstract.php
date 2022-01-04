<?php

namespace Jamshid\LaravelTransit\Services\ProduceService;

use Illuminate\Support\Facades\Log;
use Jamshid\LaravelTransit\Drivers\RabbitMq\Broker;

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
        Log::info(get_class($this));
        return $this->message;

    }

    public function setQueue($queue)
    {
        $this->queue = $queue;
        return $this;
    }

    public function getQueue()
    {
        return $this->queue ?? (new \ReflectionClass($this))->getShortName();
    }

    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
        return $this;
    }

    public function getExchange()
    {
        return $this->exchange ?? $this->getQueue();
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

    public function sendWithRabbitMq(Broker $broker)
    {
        return (new $broker)->producer($this->getMessage(), $this->getQueue(), $this->getExchange(), $this->getRoutingKey());
    }
}