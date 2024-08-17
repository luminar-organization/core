<?php

use Luminar\Core\Events\EventDispatcher;
use Luminar\Core\Exceptions\EventDispatcherException;
use PHPUnit\Framework\TestCase;

class EventDispatcherTest extends TestCase
{
    /**
     * @var EventDispatcher $eventDispatcher
     */
    private EventDispatcher $eventDispatcher;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->eventDispatcher = new EventDispatcher();
    }

    /**
     * @return void
     * @throws EventDispatcherException
     */
    public function testListenAndDispatch()
    {
        $payload = null;
        $this->eventDispatcher->listen("test.event", function ($data) use (&$payload) {
            $payload = $data;
        });

        $this->eventDispatcher->dispatch("test.event", 'test payload');

        $this->assertEquals('test payload', $payload);
    }

    /**
     * @return void
     * @throws EventDispatcherException
     */
    public function testMultipleListeners(): void
    {
        $results = [];
        $this->eventDispatcher->listen("test.event", function ($data) use (&$results) {
            $results[] = $data;
        });
        $this->eventDispatcher->listen("test.event", function ($data) use (&$results) {
            $results[] = $data .' again';
        });

        $this->eventDispatcher->dispatch("test.event", 'test payload');

        $this->assertCount(2, $results);
        $this->assertEquals('test payload', $results[0]);
        $this->assertEquals('test payload again', $results[1]);
    }

    /**
     * @return void
     * @throws EventDispatcherException
     */
    public function testClearListeners(): void
    {
        $this->expectException(EventDispatcherException::class);
        $this->expectExceptionMessage("Event [test.event] does not exists");
        $payload = null;
        $this->eventDispatcher->listen('test.event', function($data) use (&$payload) {
            $payload = $data;
        });

        $this->eventDispatcher->clearListeners('test.event');
        $this->eventDispatcher->dispatch("test.event", 'test payload');
    }

    /**
     * @return void
     * @throws EventDispatcherException
     */
    public function testDispatchNonExistentEvent(): void
    {
        $this->expectException(EventDispatcherException::class);
        $this->expectExceptionMessage("Event [nonexistent] does not exists");

        $this->eventDispatcher->dispatch('nonexistent');
    }
}