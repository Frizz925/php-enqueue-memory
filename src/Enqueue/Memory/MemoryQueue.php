<?php namespace Enqueue\Memory;

use Enqueue\Null\NullQueue;

class MemoryQueue extends NullQueue
{
    /** @var MemoryContext */
    public $context;

    public function __construct($name, MemoryContext $context)
    {
        parent::__construct($name);
        $this->context = $context;
    }
}