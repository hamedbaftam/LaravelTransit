<?php

namespace Jamshid\LaravelTransit\Services\ConsumerService;

use Jamshid\LaravelTransit\Drivers\RabbitMq\Broker;

class ConsumerAbstract
{
    public function consume($queueName, callable $callback)
    {
        $broker = new Broker();

        $broker->consume($queueName, function ($message) use ($callback) {
            call_user_func($callback, $message->body);
        });
    }
}