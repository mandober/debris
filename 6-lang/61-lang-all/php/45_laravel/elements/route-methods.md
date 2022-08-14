# Route Methods

* all methods are static
* routing class and methods are defined in:
  - vendor\laravel\framework\src\Illuminate\Routing\Router.php
  - vendor\laravel\framework\src\Illuminate\Support\Facades\Route.php

Type aliases:
```hs
type Action = \Closure|array|string|callable|null
type Route = \Illuminate\Routing\Route
type RouteRegistrar = \Illuminate\Routing\RouteRegistrar
type PendingResourceRegistration = \Illuminate\Routing\PendingResourceRegistration
```

These type aliases above are used to shoten the long type names in the methods below.

```php
Route::get    (string $uri, Action $action) : Route;
Route::post   (string $uri, Action $action) : Route;
Route::put    (string $uri, Action $action) : Route;
Route::delete (string $uri, Action $action) : Route;
Route::patch  (string $uri, Action $action) : Route;
Route::options(string $uri, Action $action) : Route;
Route::any    (string $uri, Action $action) : Route;
/**

 * Route match(array|string $methods, string $uri, Action $action)
 * Route fallback(Action $action)
 
 * RouteRegistrar prefix(string $prefix)
 * RouteRegistrar where(array $where)

 * PendingResourceRegistration resource(string $name, string $controller, array $options = [])
 * PendingResourceRegistration apiResource(string $name, string $controller, array $options = [])
 
 * void apiResources(array $resources, array $options = [])
 * RouteRegistrar middleware(array|string|null $middleware)
 * Route substituteBindings(\Illuminate\Support\Facades\Route $route)
 * void substituteImplicitBindings(\Illuminate\Support\Facades\Route $route)
 
 * RouteRegistrar as(string $value)
 * RouteRegistrar domain(string $value)
 * RouteRegistrar name(string $value)
 * RouteRegistrar namespace(string $value)
 * \Illuminate\Routing\Router|RouteRegistrar group(\Closure|string|array $attributes, \Closure|string $routes)
 
 * Route redirect(string $uri, string $destination, int $status = 302)
 * Route permanentRedirect(string $uri, string $destination)
 * Route view(string $uri, string $view, array $data = [])

 * void bind(string $key, string|callable $binder)
 * void model(string $key, string $class, \Closure|null $callback = null)
 
 * Route current()

 * string|null currentRouteName()
 * string|null currentRouteAction()
 */
```
