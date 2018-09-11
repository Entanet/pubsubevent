<?php
/**
 * Created by PhpStorm.
 * User: markjones
 * Date: 10/09/18
 * Time: 14:58
 */

namespace Entanet\PubSubEvent;

use Entanet\PubSubEvent\PubSubEvent;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PubSubEventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('pubsubevent', function() {
            return new PubSubEvent();
        });
    }
}