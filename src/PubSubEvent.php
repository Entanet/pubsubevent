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
    public static function dispatch($event, $topic = null, $dataload = null) {
        if ($topic && $dataload) {
            $pubSub = app('pubsub');
            $pubSub->publish($topic, $dataload);
        }

        Event::dispatch($event);

    }
}
