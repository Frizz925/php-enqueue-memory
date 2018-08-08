<?php namespace Enqueue\Memory;

use Enqueue\Null\NullConsumer;

class MemoryConsumer extends NullConsumer
{
    public function receive($timeout = 0)
    {
        $name = $this->getQueue()->getQueueName();
        $queue = $this->getQueue()->context->queue;
        if (!array_key_exists($name, $queue)) {
            return null;
        }
        $queue = $queue[$name];
        if (count($queue) <= 0) {
            return null;
        }
        return array_shift($queue);
    }
}