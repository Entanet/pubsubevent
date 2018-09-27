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
        $event->testEvent = true;
        $pubSubMock = \Mockery::mock('Superbalist\PubSub\Kafka\KafkaPubSubAdapter');
        $this->app->instance('pubsub', $pubSubMock);
        $pubSubMock->shouldReceive('publish')->with('test_topic', json_encode($event))->andReturn([]);

        $response = $this->pubSubEvent->dispatch($event, 'test_topic');
        $this->assertEquals([], $response);

        $response2 = $this->pubSubEvent->dispatch($event);
        $pubSubMock->shouldNotReceive('publish');
        $this->assertEquals([], $response2);
    }
}
