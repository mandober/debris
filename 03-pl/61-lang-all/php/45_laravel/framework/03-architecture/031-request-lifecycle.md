# Request Lifecycle

<!-- TOC -->

- [Request and Responses](#request-and-responses)
- [HTTP Kernel](#http-kernel)
- [Service Providers](#service-providers)
- [Dispatch Request](#dispatch-request)
- [Service Providers are the shizzam](#service-providers-are-the-shizzam)

<!-- /TOC -->

High-level overview of how the Laravel framework works.

`request -> app: { HTTP Web / HTTP API | CONSOLE } -> response`

## Request and Responses
- all requests hit the `public/index.php` (the entry file) due to the settings in `.htaccess` file in the docroot (public/web root) of the site.
- the entry file is the starting point for loading the rest of the framework:
  - it contains the Composer's autoloader
  - it retrieves an instance of the Laravel app from `bootstrap/app.php` file
- first Laravel's action is to create an instance of this Laravel app, that is, an instance of the app container or, better known as the *service container*.

## HTTP Kernel
Depending on its type, the incoming request is sent either to the **console kernel** (CLI command) or the **HTTP kernel** (web interaction).

HTTP kernel is further divided into **Web** and **API** kernels. Web part handles the usual browsing and API handles the API calls. Both kernels have their set of routes, controllers, middleware, etc.

HTTP kernel defines an array of bootstrappers that run before the request is executed, configuring:
- error handling
- logging
- detection of the app env (dev, prod)
- (other)

HTTP kernel also defines a list of *HTTP middleware* that all requests must pass (before being handled by the application):
- maintenance mode check
- reading and writing HTTP session
- verifying the CSRF token
- (other)

HTTP kernel handles incoming requests and issues outgoing responses.

## Service Providers
- on bootstrap, kernel loads the service providers (SP)
- which are configured in `config/app.php`, in the providers array
- `register()` is called on all providers first, then `boot()`
- SPs bootstrap database, queue, validation and routing components.

## Dispatch Request
After that, the request is handed off to the router. The router dispatches the request to a route or controller, also running a route's middleware.

## Service Providers are the shizzam
Default service providers are stored in the `app/Providers`. By default, the `AppServiceProvider` is fairly empty. This provider is a place to add your own bootstrapping and service container bindings. For large apps, you may create several service providers, each with a more granular type of bootstrapping.
