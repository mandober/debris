# Service Container

<!-- TOC -->

- [Introduction](#introduction)
- [Binding Basics](#binding-basics)
- [Simple Bindings](#simple-bindings)
- [Binding A Singleton](#binding-a-singleton)
- [Binding Instances](#binding-instances)
- [Binding Primitives](#binding-primitives)
- [Binding Interfaces To Implementations](#binding-interfaces-to-implementations)
- [Contextual Binding](#contextual-binding)
- [Tagging](#tagging)
- [Extending Bindings](#extending-bindings)
- [Resolving](#resolving)
- [The make Method](#the-make-method)
- [Automatic Injection](#automatic-injection)
- [Container Events](#container-events)
- [PSR-11](#psr-11)

<!-- /TOC -->

## Introduction

The Laravel service container is a tool for managing class dependencies and performing dependency injection.

Dependency injection is a fancy phrase that essentially means this: class dependencies are "injected" into the class via the constructor or, in some cases, "setter" methods.

Example:

```php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\User;

class UserController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);

        return view('user.profile', ['user' => $user]);
    }
}
```

In this example, the `UserController` needs to retrieve users from a data source. So, we will inject a service that is able to retrieve users. In this context, our `UserRepository` most likely uses Eloquent to retrieve user information from the database. However, since the repository is injected, we are able to easily swap it out with another implementation. We are also able to easily "mock", or create a dummy implementation of the `UserRepository` when testing our application.


## Binding Basics
Almost all of your service container bindings will be registered within service providers, so most of these examples will demonstrate using the container in that context.

There is no need to bind classes into the container if they do not depend on any interfaces. The container does not need to be instructed on how to build these objects, since it can automatically resolve these objects using reflection.

## Simple Bindings

Within a service provider, you always have access to the container via the `$this->app property`.

We can register a binding using the `bind` method, passing the class or interface name that we wish to register along with a Closure that returns an instance of the class.

```php
$this->app->bind('HelpSpot\API', function ($app) {
    return new HelpSpot\API($app->make('HttpClient'));
});
```

Note that we receive the container itself as an argument to the resolver. We can then use the container to resolve sub-dependencies of the object we are building.


## Binding A Singleton

The `singleton` method binds a class or interface into the container that should only be resolved one time. Once a singleton binding is resolved, the same object instance will be returned on subsequent calls into the container.

```php
$this->app->singleton('HelpSpot\API', function ($app) {
    return new HelpSpot\API($app->make('HttpClient'));
});
```


## Binding Instances

You may also bind an existing object instance into the container using the instance method. The given instance will always be returned on subsequent calls into the container:

```php
$api = new HelpSpot\API(new HttpClient);

$this->app->instance('HelpSpot\API', $api);
```


## Binding Primitives
Sometimes you may have a class that receives some injected classes, but also needs an injected primitive value such as an integer. You may easily use contextual binding to inject any value your class may need:

```php
$this->app->when('App\Http\Controllers\UserController')
          ->needs('$variableName')
          ->give($value);
```


## Binding Interfaces To Implementations
A very powerful feature of the service container is its ability to bind an interface to a given implementation. For example, let's assume we have an EventPusher interface and a RedisEventPusher implementation. Once we have coded our RedisEventPusher implementation of this interface, we can register it with the service container like so:

```php
$this->app->bind(
    'App\Contracts\EventPusher',
    'App\Services\RedisEventPusher'
);
```

This statement tells the container that it should inject the RedisEventPusher when a class needs an implementation of EventPusher. Now we can type-hint the EventPusher interface in a constructor, or any other location where dependencies are injected by the service container:

```php
use App\Contracts\EventPusher;

/**
 * Create a new class instance.
 *
 * @param  EventPusher  $pusher
 * @return void
 */
public function __construct(EventPusher $pusher)
{
    $this->pusher = $pusher;
}
```

## Contextual Binding
Sometimes you may have two classes that utilize the same interface, but you wish to inject different implementations into each class. For example, two controllers may depend on different implementations of the Illuminate\Contracts\Filesystem\Filesystem contract. Laravel provides a simple, fluent interface for defining this behavior:

```php
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoController;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

$this->app->when(PhotoController::class)
          ->needs(Filesystem::class)
          ->give(function () {
              return Storage::disk('local');
          });

$this->app->when([VideoController::class, UploadController::class])
          ->needs(Filesystem::class)
          ->give(function () {
              return Storage::disk('s3');
          });
```

## Tagging
Occasionally, you may need to resolve all of a certain "category" of binding. For example, perhaps you are building a report aggregator that receives an array of many different Report interface implementations. After registering the Report implementations, you can assign them a tag using the tag method:

```php
$this->app->bind('SpeedReport', function () {
    //
});

$this->app->bind('MemoryReport', function () {
    //
});

$this->app->tag(['SpeedReport', 'MemoryReport'], 'reports');
Once the services have been tagged, you may easily resolve them all via the tagged method:

$this->app->bind('ReportAggregator', function ($app) {
    return new ReportAggregator($app->tagged('reports'));
});
```

## Extending Bindings
The extend method allows the modification of resolved services. For example, when a service is resolved, you may run additional code to decorate or configure the service. The extend method accepts a Closure, which should return the modified service, as its only argument. The Closure receives the service being resolved and the container instance:

```php
$this->app->extend(Service::class, function ($service, $app) {
    return new DecoratedService($service);
});
```


## Resolving

## The make Method
You may use the make method to resolve a class instance out of the container. The make method accepts the name of the class or interface you wish to resolve:

```php
$api = $this->app->make('HelpSpot\API');
```

If you are in a location of your code that does not have access to the $app variable, you may use the global resolve helper:

```php
$api = resolve('HelpSpot\API');
```


If some of your class' dependencies are not resolvable via the container, you may inject them by passing them as an associative array into the makeWith method:

```php
$api = $this->app->makeWith('HelpSpot\API', ['id' => 1]);
```

## Automatic Injection
Alternatively, and importantly, you may "type-hint" the dependency in the constructor of a class that is resolved by the container, including controllers, event listeners, middleware, and more. Additionally, you may type-hint dependencies in the handle method of queued jobs. In practice, this is how most of your objects should be resolved by the container.

For example, you may type-hint a repository defined by your application in a controller's constructor. The repository will automatically be resolved and injected into the class:


```php
namespace App\Http\Controllers;

use App\Users\Repository as UserRepository;

class UserController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Show the user with the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
}
```


## Container Events
The service container fires an event each time it resolves an object. You may listen to this event using the resolving method:

```php
$this->app->resolving(function ($object, $app) {
    // Called when container resolves object of any type...
});

$this->app->resolving(HelpSpot\API::class, function ($api, $app) {
    // Called when container resolves objects of type "HelpSpot\API"...
});
```

As you can see, the object being resolved will be passed to the callback, allowing you to set any additional properties on the object before it is given to its consumer.


## PSR-11
Laravel's service container implements the PSR-11 interface. Therefore, you may type-hint the PSR-11 container interface to obtain an instance of the Laravel container:

```php
use Psr\Container\ContainerInterface;

Route::get('/', function (ContainerInterface $container) {
    $service = $container->get('Service');

    //
});
```

An exception is thrown if the given identifier can't be resolved. The exception will be an instance of Psr\Container\NotFoundExceptionInterface if the identifier was never bound. If the identifier was bound but was unable to be resolved, an instance of Psr\Container\ContainerExceptionInterface will be thrown.
