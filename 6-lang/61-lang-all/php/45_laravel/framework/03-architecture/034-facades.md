# Facades

<!-- TOC -->

- [Introduction](#introduction)
- [Facades vs alternatives](#facades-vs-alternatives)
  - [Facades vs DI](#facades-vs-di)
  - [Facades vs Helpers](#facades-vs-helpers)
- [How Facades Work](#how-facades-work)
- [Real-Time Facades](#real-time-facades)
- [Facade Class Reference](#facade-class-reference)

<!-- /TOC -->


## Introduction

**Facades** enable static-like access to classes in the *Service Container*.

**Laravel's facades** serve as *static proxies* to the underlying classes in the SC, enabling the expressive syntax with benefits of full testability and flexibility (unlike traditional static methods).

All Laravel's facades are in the __Illuminate\Support\Facades__ namespace.

However, the use of facades confuses IDEs, so they often deem correct Laravel code problematic. The solution is to generate phpDoc blocks using a tool like `laravel-ide-helper`: https://github.com/barryvdh/laravel-ide-helper


## Facades vs alternatives

Facades enable access to classes using a terse, memorable syntax. Every action in Laravel may be done starting with a facade, so they also act as reminders on how to go about approaching a task. For example, in case of db access, think of `DB` facade. Facades allow use of Laravel's features without remembering long class names that had to be injected or configured manually. Because of their unique usage of PHP's dynamic methods, they are easy to test.

The primary danger of facades is *class scope creep*. Since facades are so easy to use and do not require injection, it can be easy to let your classes continue to grow and use many facades in a single class.

Using DI, this potential is mitigated by the visual feedback a large constructor gives you that your class is growing too large.

> When using facades, pay special attention to the size of your class so that its scope of responsibility stays narrow.

When building a third-party package that interacts with Laravel, it's better to inject *Laravel contracts* instead of using facades. Since packages are built outside of Laravel itself, you will not have access to Laravel's facade testing helpers.


### Facades vs DI

One of the primary benefits of *Dependency Injection (DI)* is the ability to swap implementations of the injected class.

This is useful during testing since you can inject a mock or stub and assert that various methods were called on the stub.

Typically, it would not be possible to mock or stub a truly static class method.

However, since *facades use dynamic methods to proxy method calls to objects resolved from the SC*, we can test facades easily.

For example, given the following route:

```php
use Illuminate\Support\Facades\Cache;

Route::get('/cache', function () {
    return Cache::get('key');
});
```

this test verifies that `Cache::get` was called with the expected arg:

```php
use Illuminate\Support\Facades\Cache;

public function testBasicExample()
{
    Cache::shouldReceive('get')
         ->with('key')
         ->andReturn('value');

    $this->visit('/cache')
         ->see('value');
}
```


### Facades vs Helpers

In addition to facades, Laravel includes a variety of **helper functions** which perform common tasks like generating views, firing events, dispatching jobs or sending HTTP responses. **Many of these helper functions perform the same function as a corresponding facade**.

For example, this facade call and helper call are equivalent:

```php
return View::make('profile');
return view('profile');
```

**There is no practical difference between facades and helper functions**. When using helper functions, you may still test them exactly as you would the corresponding facade.

For example, given the following route:

```php
Route::get('/cache', function () {
    return cache('key');
});
```

Under the hood, the `cache` helper is going to call the `get` method on the class underlying the `Cache` facade.

So, even though we are using the helper function, we can write the following test to verify that the method was called with the argument we expected:

```php
use Illuminate\Support\Facades\Cache;

public function testBasicExample()
{
    Cache::shouldReceive('get')
         ->with('key')
         ->andReturn('value');

    $this->visit('/cache')
         ->see('value');
}
```



## How Facades Work

In a Laravel application, **a facade is a class that provides access to an object from the container**. The machinery that makes this work is in the `Facade` class. Laravel's facades, and any custom facades you create, will extend the base `Illuminate\Support\Facades\Facade` class.

The `Facade` base class makes use of the `__callStatic()` magic-method to defer calls from your facade to an object resolved from the container.

In the example below, a call is made to the Laravel cache system. By glancing at this code, one might assume that the static method get is being called on the Cache class:

```php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller {
    public function showProfile($id) {
        $user = Cache::get('user:'.$id);
        return view('profile', ['user' => $user]);
    }
}
```

Notice that near the top of the file we are "importing" the Cache facade. This facade serves as a proxy to accessing the underlying implementation of the `Illuminate\Contracts\Cache\Factory` interface. Any calls we make using the facade will be passed to the underlying instance of Laravel's cache service.

If we look at that `Illuminate\Support\Facades\Cache` class, you'll see that there is no static method get:

```php
class Cache extends Facade {
    protected static function getFacadeAccessor() { return 'cache'; }
}
```


Instead, the Cache facade extends the base Facade class and defines the method `getFacadeAccessor()`. This method's job is to return the name of a service container binding.

**When a user references any static method on the `Cache` facade, Laravel resolves the cache binding from the service container and runs the requested method (in this case, get) against that object**.



## Real-Time Facades

__Real-time facades allow treating a model as if it were a facade__.

To illustrate how this can be used, let's examine an alternative. For example, let's assume our `Podcast` model has a `publish` method. However, in order to publish the podcast, we need to inject a `Publisher` instance:


```php
namespace App;

use Illuminate\Database\Eloquent\Model;

// We import the Publisher model as usual:
use App\Contracts\Publisher;

class Podcast extends Model
{
    public function publish(Publisher $publisher)
    {
        $this->update(['publishing' => now()]);
        $publisher->publish($this);
    }
}
```


Injecting a `publisher` implementation into the method allows us to easily test the method in isolation since we can mock the injected publisher.

However, it requires us to **pass a publisher instance every time** we call the `publish` method.

Real-time facades provide the *same testability with less boilerplate*, as they don't require an explicitly passed `Publisher` instance.

*To generate a real-time facade, prefix the namespace of the imported class with* __Facades__.


```php
namespace App;

use Illuminate\Database\Eloquent\Model;

# use       App\Contracts\Publisher;   // usual import
use Facades\App\Contracts\Publisher;   // real-time facade import

class Podcast extends Model {
    public function publish() {
        $this->update(['publishing' => now()]);
        Publisher::publish($this);
    }
}
```

With a real-time facade, a model is resolved out of the SC *using the portion of the interface (or class name) after the `Facades` prefix*.

When testing, we can use `facade` helper to mock this method call.

```php
namespace Tests\Feature;

use App\Podcast;
use Facades\App\Contracts\Publisher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PodcastTest extends TestCase {
    use RefreshDatabase;
    
    public function test_podcast_can_be_published() {
        $podcast = factory(Podcast::class)->create();
        Publisher::shouldReceive('publish')->once()->with($podcast);
        $podcast->publish();
    }
}
```


## Facade Class Reference

List to quickly dig into the API docs for a given facade root. 
*Service Container Binding* (SCB) key is also included where applicable.

- All classes FQN begin with the prefix `Illuminate\`
- `<obj>` stands instead of `(instance)` as in the original table


Facade               | Class                                | SCB
---------------------|--------------------------------------|-----------
App                  | Foundation\Application               | app
Artisan              | Contracts\Console\Kernel             | artisan
Auth                 | Auth\AuthManager                     | auth
Auth <obj>           | Contracts\Auth\Guard                 | auth.driver
Password             | Auth\Passwords\PasswordBrokerManager | auth.password
Password <obj>       | Auth\Passwords\PasswordBroker        | auth.password.broker
Config               | Config\Repository                    | config
Route                | Routing\Router                       | router
DB                   | Database\DatabaseManager             | db
DB <obj>             | Database\Connection                  | db.connection
View                 | View\Factory                         | view
View <obj>           | View\View                            |
Request              | Http\Request                         | request
Redirect             | Routing\Redirector                   | redirect
Gate                 | Contracts\Auth\Access\Gate           |
Response             | Contracts\Routing\ResponseFactory    |
Response <obj>       | Http\Response                        |
Schema               | Database\Schema\Builder              |
Session              | Session\SessionManager               | session
Session <obj>        | Session\Store                        | session.store
Hash                 | Contracts\Hashing\Hasher             | hash
Storage              | Filesystem\FilesystemManager         | filesystem
Storage <obj>        | Contracts\Filesystem\Filesystem      | filesystem.disk
URL                  | Routing\UrlGenerator                 | url
Validator            | Validation\Factory                   | validator
Validator <obj>      | Validation\Validator                 |
Cache                | Cache\CacheManager                   | cache
Cache <obj>          | Cache\Repository                     | cache.store
Cookie               | Cookie\CookieJar                     | cookie
Crypt                | Encryption\Encrypter                 | encrypter
Blade                | View\Compilers\BladeCompiler         | blade.compiler
Broadcast            | Contracts\Broadcasting\Factory       |
Broadcast <obj>      | Contracts\Broadcasting\Broadcaster   |
Bus                  | Contracts\Bus\Dispatcher             |
Event                | Events\Dispatcher                    | events
File                 | Filesystem\Filesystem                | files
Notification         | Notifications\ChannelManager         |
Mail                 | Mail\Mailer                          | mailer
Queue                | Queue\QueueManager                   | queue
Queue <obj>          | Contracts\Queue\Queue                | queue.connection
Queue <BaseClass>    | Queue\Queue                          |
Lang                 | Translation\Translator               | translator
Log                  | Log\LogManager                       | log
Redis                | Redis\RedisManager                   | redis
Redis <obj>          | Redis\Connections\Connection         | redis.connection
