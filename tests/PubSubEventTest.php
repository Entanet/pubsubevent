<?php
/**
 * Created by PhpStorm.
 * User: markjones
 * Date: 12/09/18
 * Time: 10:22
 */

namespace Entanet\PubSubEvent;

use Superbalist\PubSub\PubSubAdapterInterface;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;

class PubSubEventTest extends TestCase
{
    public function setUp() {
        parent::setUp();

        $this->pubSubEvent = new PubSubEvent();
    }

    public function testDispatch()
    {
        $event = new \stdClass();
        $event->topic = 'test_topic';
        $event->testEvent = true;

        $mock = \Mockery::mock(PubSubEvent::class);
        $this->app->instance(PubSubEvent::class, $mock);

        $response = $this->pubSubEvent->dispatch($event);

        $this->assertEquals([], $response);
        $mock->shouldReceive('dispatch')->andReturn([]);
    }
}
