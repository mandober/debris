# Routing

https://laravel.com/docs/master/routing

- Basic Routing
  - Redirect Routes
  - View Routes
- Route Parameters
  - Required Parameters
  - Optional Parameters
  - Regular Expression Constraints
- Named Routes
- Route Groups
  - Middleware
  - Namespaces
  - Sub-Domain Routing
  - Route Prefixes
  - Route Name Prefixes
- Route Model Binding
  - Implicit Binding
  - Explicit Binding
- Fallback Routes
- Rate Limiting
- Form Method Spoofing
- Accessing The Current Route


Routes are managed by the `Illuminate\Support\Facades\Route` facade. 
The `class Route extends Facade` in `vendor\laravel\framework\src\Illuminate\Support\Facades\Route.php`

## Basic routing

### Six HTTP verbs
Routing is done through the `Route` facade (proxy to the underlying `Route` class) and its 6 HTTP methods: `get`, `post`, `put`, `delete`, `patch` and `options`. Each of these methods accept an URI (as `$uri`) and a Closure (as `$action`) parameters.

```php
Route::<get|post|put|delete|patch|options>($uri, $action);
```

Even though there are more HTTP verbs, most browser bother only with `GET` and `POST` implementations. However, these two verbs can fake the other actions like `PUT`, `PATCH` and `DELETE`.

`HEAD` is the same as `GET` minus the body of the response.

`OPTIONS` verb is used to query the server for the list of supported verbs.

`TRACE` is used to echo back the request so the client can see what request did the server actually received (after traversing half the world's proxies and intermediate network nodes that are prone to add/remove something from the original request).



### Any HTTP verb
Use `any()` method to register a route that responds to *any HTTP verb*.

```php
Route::any($uri, $action)
```


### Multiple HTTP verbs
To register a route that responds to multiple HTTP verbs, use the match method  which accepts an array of HTTP verbs as the first parameter.

```php
Route::match(['get', 'post'], '/', $action);
```



**CSRF Protection**: include CSRF token in a POST, PUT, DELETE form or the request is rejected.

```php
<form method="POST" action="/profile">
    @csrf
    ...
</form>
```


## Redirect Routes

If you are defining a route that redirects to another URI, you may use the 
`Route::redirect` method. This method provides a convenient shortcut so that you 
do not have to define a full route or controller for performing a simple redirect:

`Route::redirect('/here', '/there');`

By default, Route::redirect returns a 302 status code. 
You may customize the status code using the optional third parameter:

Route::redirect('/here', '/there', 301);

You may use the Route::permanentRedirect method to return a 301 status code:

Route::permanentRedirect('/here', '/there');





```php
#
# 1. Respond with a HTML page with a naked string
#
Route::get('/', function() {
  return 'Naked lonely string';
});

#
# 2. Respond with a view named "welcome" (in the file "welcome.blade.php")
#
Route::get('/', function() {
  return view('welcome');
});
```


## Passing data into views

If the URL was `https://example.com/?name=joe`, then the GET data, "name=joe", becomes available in the laravel's internal associative array, with "name" and "joe" as key/value pair. We can get at this value ("joe") using the request() function; it expects the name of the key, so we put in "name" and receive "joe". And now we can pass this value into the view in, at least two, styles.

```php
#
# 3. Respond with a nAked string
#
Route::get('/', function() {
  $name = request('name');
  return $name;
});


#
# 4. Respond with a view fed with some data
#
Route::get('/', function() {

  # extract data from GET request
  $name = request('name');

  # pass data into view, old-school style
  return view('welcome', [
    # laravel convert assoc array into JSON
    'name' => $name
  ]);

  # -- OR --

  # pass data into view, fluent style
  return view('welcome')->with([
    # laravel convert assoc array into JSON
    'name' => $name
  ]);

});
```
