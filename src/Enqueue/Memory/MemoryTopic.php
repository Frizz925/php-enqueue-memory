<?php namespace Enqueue\Memory;

use Enqueue\Null\NullTopic;

class MemoryTopic extends NullTopic
{
    /** @var MemoryContext */
    protected $context;

    public function __construct($name, MemoryContext $context)
    {
        parent::__construct($name);
        $this->context = $context;
    }
}
