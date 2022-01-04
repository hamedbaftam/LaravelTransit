<?php

namespace Jamshid\LaravelTransit\Drivers\RabbitMq;

use PhpAmqpLib\Message\AMQPMessage;

class Broker
{

    public function producer($message, $queue = 'default', $exchange = '', $routingKey = '')
    {
        $connection = (new Connector())->connect();


        $channel = $connection->channel();

        $channel->exchange_declare($exchange, 'direct', false, false, false);
        $channel->queue_declare($queue, false, false, false, false);
        $channel->queue_bind($queue, $exchange, $routingKey);

        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, $exchange, $routingKey);

        echo " [x] Sent 'Hello World!' to test_exchange / test_queue.\n";

        $channel->close();
        $connection->close();
    }
}