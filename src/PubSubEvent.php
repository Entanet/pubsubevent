<?php
/**
 * Created by PhpStorm.
 * User: markjones
 * Date: 10/09/18
 * Time: 14:57
 */

namespace Entanet\PubSubEvent;

use Illuminate\Support\Facades\Event;

class PubSubEvent
{
    public function dispatch($event, $topic = false) {
        if ($topic) {
            $pubSub = app('pubsub');
            $pubSub->publish($topic, json_encode($event));
        }

        return Event::dispatch($event);
    }
}
