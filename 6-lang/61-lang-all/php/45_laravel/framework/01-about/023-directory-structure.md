# Laravel Directory Structure

- app
  - Console
    * Kernel.php (artisan commands)
  - Exceptions
    * Handler.php
  - Http
    - Controllers
      - Admin
        * UsersController.php
      - Auth
        * ConfirmPasswordController.php
        * ForgotPasswordController.php
        * LoginController.php
        * RegisterController.php
        * ResetPasswordController.php
        * VerificationController.php
      * Controller.php
      * HomeController.php
      * <Model>Controller.php
    - Middleware (global HTTP middleware stack)
      * Authenticate.php            (define redirect to authentication)
      * RedirectIfAuthenticated.php
      * CheckForMaintenanceMode.php (define maintenance mode URIs)
      * EncryptCookies.php          (define cookies not to be encrypted)
      * TrimStrings.php             (def fields not to trim, e.g. password)
      * TrustProxies.php            (def trustable proxies)
      * VerifyCsrfToken.php         (def CSRF excluded URIs)
    * Kernel.php
  - Providers
    - App         AppServiceProvider.php
    - Auth        AuthServiceProvider.php
    - Broadcast   BroadcastServiceProvider.php
    - Event       EventServiceProvider.php
    - Route       RouteServiceProvider.php
  * <Model>.php
- bootstrap
  - cache
    * <cache>.php
  * app.php
- config
  * app
  * auth
  * broadcasting
  * cache
  * database
  * filesystems
  * hashing
  * logging
  * mail
  * queue
  * services
  * session
  * view
  * debugbar *post*
- routes
- database
- resources
- storage
- tests




Middleware
* `app/Http/Middleware`
* Middleware dir hosts the global HTTP middleware stack.
* Middleware that is run *on every request*
  - Trust Proxies
  - Check For Maintenance Mode
  - Validate Post Size, `ini_get('post_max_size')`
  - Trim Strings
  - Convert Empty Strings To Null
* The app's *route middleware groups* for web
  - Encrypt Cookies
  - Add Queued Cookies To Response
  - Start Session
  - Share Errors From Session
  - Verify Csrf Token
  - Substitute Bindings
  - Authenticate Session (commented out)
* The app's *route middleware*
  * these middleware may be assigned to groups or used individually
  - auth              : Authenticate
  - auth.basic        : Authenticate With Basic Auth
  - bindings          : Substitute Bindings
  - cache.headers     : Set Cache Headers
  - can               : Authorize
  - guest             : Redirect If Authenticated
  - password.confirm  : Require Password
  - signed            : Validate Signature
  - throttle          : Throttle Requests
  - verified          : Ensure Email Is Verified
* The *priority-sorted* list of middleware
  * this forces non-global middleware to always be sorted in the given order
  - StartSession
  - ShareErrorsFromSession
  - Authenticate
  - ThrottleRequests
  - AuthenticateSession
  - SubstituteBindings
  - Authorize



bootstrap/app.php
- Creates a new Laravel application instance, `$app`, which serves as the DI container and it also integrates all Laravel's components.
- defines `$_ENV['APP_BASE_PATH']` by consulting .env, else by setting it to its parent dir. So the `APP_BASE_PATH` or sometimes just a reference to app path is the root project dir.
- Within it, there's a `public` dir which is *docroot* folder i.e. publically accessible web root.
