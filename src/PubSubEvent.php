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


    public function __construct()
    {

    }

    public function dispatch($event) {
        if ($event->topic) {
            $pubSub = app('pubsub');
            $pubSub->publish($event->topic, json_encode($event));
        }

        Event::dispatch($event);

    }
}
