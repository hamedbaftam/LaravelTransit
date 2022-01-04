<?php

namespace Jamshid\LaravelTransit\Drivers\RabbitMq;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class Connector
{
    public function connect()
    {
        return new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
    }
}