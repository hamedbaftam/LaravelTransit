<?php

namespace Jamshid\LaravelTransit\Services\ConsumerService;

use Jamshid\LaravelTransit\Drivers\RabbitMq\Broker;

class ConsumerAbstract
{
    public function consume()
    {
        $broker = new Broker();
        return $broker->consume('WithdrawProduce', function () {
            info('areeee');
        });
    }
}