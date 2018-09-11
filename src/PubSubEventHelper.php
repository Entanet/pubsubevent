<?php
/**
 * Created by PhpStorm.
 * User: markjones
 * Date: 10/09/18
 * Time: 14:58
 */

if (!function_exists('event')) {
    function event(...$args)
    {
        return app('pubsubevent')->dispatch(...$args);
    }
}