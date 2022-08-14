# Middleware



## Introduction

Middleware provide a convenient mechanism for filtering HTTP requests entering your application.

For example, Laravel includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to the login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application.

Additional middleware can be written to perform a variety of tasks besides authentication.

There are several middleware included in the Laravel framework, including middleware for authentication and CSRF protection. All of these middleware are located in the `app/Http/Middleware` directory.


## Defining Middleware

To create a new middleware, use the make:middleware Artisan command:

`php artisan make:middleware CheckAge`

This command will place a new `CheckAge` class within your `app/Http/Middleware` directory. In this middleware, we will only allow access to the route if the supplied age is greater than 200. Otherwise, we will redirect the users back to the home URI.


```php
namespace App\Http\Middleware;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ($request->age <= 200) {
            return redirect('home');
        }
        return $next($request);
    }
}
```

As you can see, if the given age is less than or equal to 200, the middleware will return an HTTP redirect to the client; otherwise, the request will be passed further into the application.

To pass the request deeper into the application (allowing the middleware to "pass"), call the `$next` callback with the $request.

It's best to envision middleware as a series of "layers" HTTP requests must pass through before they hit your application. Each layer can examine the request and even reject it entirely.

> All middleware are resolved via the service container, so you may type-hint any dependencies you need within a middleware's constructor.
