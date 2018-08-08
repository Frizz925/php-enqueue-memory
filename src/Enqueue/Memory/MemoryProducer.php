<?php namespace Enqueue\Memory;

use Interop\Queue\PsrDestination;
use Interop\Queue\PsrMessage;
use Enqueue\Null\NullProducer;

class MemoryProducer extends NullProducer
{
    /** @var MemoryContext */
    protected $context;

    public function __construct(MemoryContext $context)
    {
        $this->context = $context;
    }

    public function send(PsrDestination $destination, PsrMessage $message)
    {
        $name = $destination->getQueueName();
        $queue = &$destination->context->queue;
        if (!array_key_exists($name, $queue)) {
            $queue[$name] = [];
        }
        $queue[$name][] = $message;
    }
}