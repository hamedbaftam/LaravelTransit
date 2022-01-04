<?php

namespace Jamshid\LaravelTransit\Drivers\RabbitMq;

use PhpAmqpLib\Message\AMQPMessage;

class Broker
{

    public function producer($message, $queue = 'default', $exchange = '', $routingKey = '')
    {
        $connection = (new Connector())->connect();


        $channel = $connection->channel();

        $channel->exchange_declare($exchange, 'direct', false, true, false);
        $channel->queue_declare($queue, false, false, false, false);
        $channel->queue_bind($queue, $exchange, $routingKey);

        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, $exchange, $routingKey);

        $channel->close();
        $connection->close();
    }
}