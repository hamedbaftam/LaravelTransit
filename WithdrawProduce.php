<?php

namespace LaravelTransit;

use LaravelTransit\Services\Produce\ProduceAbstract;
use LaravelTransit\Services\Produce\ProducerInterface;

class WithdrawProduce extends ProduceAbstract implements ProducerInterface
{

}


//$hamed = (new Services\Produce\Produce())->send(WithdrawProduce::class)->setMessage();