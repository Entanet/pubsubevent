# Pub Sub Event

Wrapper for Laravel events so that an event can be published without using a listener.

## Getting Started

Drop it into your laravel projects where you want events to publish direct to a PubSub
 queue without using a listener.

## Prerequisities

Laravel 5.6+
superbalist/laravel-pubsub


### Installing

Run  in your Laravel project to install the library:

```
    composer require entanet/kafka-event
```

### Overriding the Laravel global helper event

Laravel comes with a global helper event which calls the link class. If you want to override 
that helper with the kafka event you need to require the kafkaEventHelper.php file before the
 vendor/autoload.php. Here is an example from the index.php file in Laravel 5.6:
 
```
      // KafkaEventHelper.php is used to override the laravel global event helper.
     require __DIR__.'/../vendor/entanet/kafka-event/src/kafkaEventHelper.php';
     require __DIR__.'/../vendor/autoload.php';
    
```

### Using kafka event

If you want to call 
