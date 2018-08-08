<?php
require_once(__DIR__.'/vendor/autoload.php');

use Enqueue\Memory\MemoryConnectionFactory;

$connectionFactory = new MemoryConnectionFactory;
$psrContext = $connectionFactory->createContext();
$queue = $psrContext->createQueue('EchoQueue');

$producer = $psrContext->createProducer();
$message = $psrContext->createMessage('Hello, world!');
$producer->send($queue, $message);

$consumer = $psrContext->createConsumer($queue);
$message = $consumer->receive();
$body = $message->getBody();
print_r($body);