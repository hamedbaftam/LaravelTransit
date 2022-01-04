<?php

namespace LaravelTransit;

use LarvelTransit\Services\Produce\ProduceAbstract;
use LarvelTransit\Services\Produce\ProducerInterface;

class WithdrawProduce extends ProduceAbstract implements ProducerInterface
{

}


//$hamed = (new Services\Produce\Produce())->send(WithdrawProduce::class)->setMessage();