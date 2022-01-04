<?php

namespace Jamshid\LaravelTransit\Drivers\RabbitMq;

use Illuminate\Support\Facades\App;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use function Illuminate\Support\Facades\App;

class Connector
{
    public function connect()
    {
        $config = config('laravel-transit.drivers.rabbitMq');
        return new AMQPStreamConnection($config['host'], $config['port'], $config['user'], $config['password']);
    }
}