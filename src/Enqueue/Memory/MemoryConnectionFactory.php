<?php namespace Enqueue\Memory;

use Enqueue\Null\NullConnectionFactory;

class MemoryConnectionFactory extends NullConnectionFactory
{
    public function createContext()
    {
        return new MemoryContext;
    }
}