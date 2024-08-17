<?php

namespace Luminar\Core\Events;

use Luminar\Core\Exceptions\EventDispatcherException;

class EventDispatcher
{

    /**
     * @var array $listeners
     */
    protected array $listeners = [];

    /**
     * Register an event listener
     *
     * @param  string   $event
     * @param  callable $listener
     * @return void
     */
    public function listen(string $event, callable $listener): void
    {
        $this->listeners[$event][] = $listener;
    }

    /**
     * Dispatch an event to all registered listeners
     *
     * @param  string $event
     * @param  $payload
     * @return void
     * @throws EventDispatcherException
     */
    public function dispatch(string $event, $payload = null): void
    {
        if(!isset($this->listeners[$event])) { throw new EventDispatcherException("Event [$event] does not exists");
        }

        foreach($this->listeners[$event] as $listener) {
            call_user_func($listener, $payload);
        }
    }

    /**
     * Clear all listeners for an event
     *
     * @param  string $event
     * @return void
     */
    public function clearListeners(string $event): void
    {
        unset($this->listeners[$event]);
    }
}
