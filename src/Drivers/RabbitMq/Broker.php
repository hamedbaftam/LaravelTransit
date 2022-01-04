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
        $channel->queue_declare($queue, false, true, false, false);
        $channel->queue_bind($queue, $exchange, $routingKey);

        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, $exchange, $routingKey);

        $channel->close();
        $connection->close();
    }

    public function consume($queue = 'WithdrawProduce', callable $callback)
    {
        $connection = (new Connector())->connect();

        $channel = $connection->channel();

        $callback = function ($msg) use ($callback) {
            call_user_func($callback, $msg);
        };

        $channel->basic_consume($queue, '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}