# Service Providers

<!-- TOC -->

- [Introduction](#introduction)
- [Writing Service Providers](#writing-service-providers)
  - [Register Method](#register-method)
  - [Bindings and Singletons](#bindings-and-singletons)
  - [Boot Method](#boot-method)
  - [Boot DI](#boot-di)
- [Registering Providers](#registering-providers)
  - [Deferred Providers](#deferred-providers)

<!-- /TOC -->

## Introduction

**Service Providers (SP)** are the central place of Laravel bootstrapping; all Laravel's core services are bootstrapped via SPs.

Generally, *bootstrapping* means registering things, including registering *Service Container Bindings (SCB)*, event listeners, middleware, and even routes. SPs are the central place to configure your app.

The file `config/app.php` contains SP array - all SP classes that __get loaded on each request__. Many are **deferred providers**, meaning they will not be loaded on every request, but only when the service they provide is actually needed.


## Writing Service Providers

- All SPs extend the `Illuminate\Support\ServiceProvider` class
- Most SPs contain a `register` and `boot` method
- Generate a new provider: `php artisan make:provider RiakServiceProvider`


### Register Method

__Within `register`, only bind things into the SC. Never register an event listener, route or other piece of functionality__. Otherwise, you may accidentally use a service of a provider that is not yet loaded.


Within any of your service provider methods, you always have access to the `$app` property which gives access to the SC.



### Bindings and Singletons

If the SP registers many simple bindings, you may wish to use `bindings` and `singletons` properties, instead of manually registering each container binding. When the SP is loaded by the framework, it will automatically check for these properties and register their bindings.


```php
class AppServiceProvider extends ServiceProvider {
    // container bindings to register
    public $bindings = [
        ServerProvider::class => DigitalOceanServerProvider::class,
    ];

    // container singletons to register
    public $singletons = [
        DowntimeNotifier::class => PingdomDowntimeNotifier::class,
        ServerToolsProvider::class => ServerToolsProvider::class,
    ];
}
```


### Boot Method

Registering a *view composer* within the service provider should be done within the `boot` method.

**This method is called after all other SPs have been registered**, meaning you have access to all other services that have been registered by the framework.


```php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    public function boot(){
        view()->composer('view', function () {
            // ...
        });
    }
}
```


### Boot DI

You may type-hint dependencies for your SP `boot` method. The SC will automatically inject any dependencies:

```php
use Illuminate\Contracts\Routing\ResponseFactory;

public function boot(ResponseFactory $response) {
    $response->macro('caps', function ($value) {
        //
    });
}
```



## Registering Providers

All SPs are registered in the `config/app.php` configuration file. This file contains a providers array, listing SP class names. By default, a set of Laravel core service providers are listed in this array. They bootstrap the core Laravel components.

To register your provider, add it to the array.


### Deferred Providers

If your provider is only registering bindings in the SC, you may choose to **defer its registration** until one of the registered bindings is actually needed.

Deferring the loading of such a provider will improve the performance of your app, since it is not loaded from the filesystem on every request.


Laravel compiles and stores a list of all of the services supplied by deferred service providers, along with the name of its service provider class.

Then, only when you attempt to resolve one of these services does Laravel load the service provider.


To defer a provider, impl `\Illuminate\Contracts\Support\DeferrableProvider` and define a `provides` method. The `provides` method should return the SCBs registered by the provider:


```php
namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Riak\Connection;

class RiakServiceProvider
  extends ServiceProvider
  implements DeferrableProvider   // step#1: impl interface
  {
    // Register any app services
    public function register() {
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection($app['config']['riak']);
        });
    }

    // step#2: define `provides` that returns SCBs
    public function provides() { 
        // Get the services provided by the provider
        return [Connection::class];
    }
}
```
