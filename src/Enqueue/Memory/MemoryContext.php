<?php namespace Enqueue\Memory;

use Enqueue\Null\NullContext;
use Interop\Queue\PsrDestination;

class MemoryContext extends NullContext
{
    /** @var array */
    public $queue;

    public function __construct()
    {
        $this->queue = [];
    }

    /**
     * {@inheritDoc}
     * 
     * @return MemoryMessage
     */
    public function createMessage($body = '', array $properties = [], array $headers = [])
    {
        return new MemoryMessage($body, $properties, $headers);
    }

    /**
     * {@inheritDoc}
     * 
     * @return MemoryQueue
     */
    public function createQueue($name)
    {
        return new MemoryQueue($name, $this);
    }

    /**
     * {@inheritDoc}
     * 
     * @return MemoryTopic
     */
    public function createTopic($name)
    {
        return new MemoryTopic($name, $this);
    }

    /**
     * {@inheritDoc}
     * 
     * @return MemoryConsumer
     */
    public function createConsumer(PsrDestination $destination)
    {
        return new MemoryConsumer($destination);
    }

    /**
     * {@inheritDoc}
     * 
     * @return MemoryProducer
     */
    public function createProducer()
    {
        return new MemoryProducer($this);
    }

    public function close()
    {
        $this->queue = [];
    }
}