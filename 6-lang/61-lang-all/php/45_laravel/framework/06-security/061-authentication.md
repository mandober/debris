# Authentication

<!-- TOC -->

- [Introduction](#introduction)
  - [Database Considerations](#database-considerations)
- [Authentication Quickstart](#authentication-quickstart)
  - [Routing](#routing)
    - [Creating Apps with Authentication](#creating-apps-with-authentication)
  - [Views](#views)
  - [Authenticating](#authenticating)
    - [Path Customization](#path-customization)
    - [Username Customization](#username-customization)
    - [Guard Customization](#guard-customization)
    - [Validation/Storage Customization](#validationstorage-customization)
  - [Retrieving The Authenticated User](#retrieving-the-authenticated-user)
    - [Determining If The Current User Is Authenticated](#determining-if-the-current-user-is-authenticated)
  - [Protecting Routes](#protecting-routes)
    - [Redirecting Unauthenticated Users](#redirecting-unauthenticated-users)
    - [Specifying A Guard](#specifying-a-guard)
  - [Password Confirmation](#password-confirmation)
  - [Login Throttling](#login-throttling)
- [Manually Authenticating Users](#manually-authenticating-users)

<!-- /TOC -->


* Introduction
  - Database Considerations
* Authentication Quickstart
  - Routing
  - Views
  - Authenticating
  - Retrieving The Authenticated User
  - Protecting Routes
  - Password Confirmation
  - Login Throttling
* Manually Authenticating Users
  - Remembering Users
  - Other Authentication Methods
* HTTP Basic Authentication
  - Stateless HTTP Basic Authentication
* Logging Out
  - Invalidating Sessions On Other Devices
* Social Authentication
* Adding Custom Guards
  - Closure Request Guards
* Adding Custom User Providers
  - The User Provider Contract
  - The Authenticatable Contract
* Events


## Introduction

Want to get started fast? Install the laravel/ui Composer package and run php artisan ui vue --auth in a fresh Laravel application. After migrating your database, navigate your browser to http://your-app.test/register or any other URL that is assigned to your application. These commands will take care of scaffolding your entire authentication system!

Laravel makes implementing authentication very simple. In fact, almost everything is configured for you out of the box. The authentication configuration file is located at config/auth.php, which contains several well documented options for tweaking the behavior of the authentication services.

At its core, Laravel's authentication facilities are made up of "guards" and "providers". Guards define how users are authenticated for each request. For example, Laravel ships with a session guard which maintains state using session storage and cookies.

Providers define how users are retrieved from your persistent storage. Laravel ships with support for retrieving users using Eloquent and the database query builder. However, you are free to define additional providers as needed for your application.

Don't worry if this all sounds confusing now! Many applications will never need to modify the default authentication configuration.

### Database Considerations
By default, Laravel includes an App\User Eloquent model in your app directory. This model may be used with the default Eloquent authentication driver. If your application is not using Eloquent, you may use the database authentication driver which uses the Laravel query builder.

When building the database schema for the App\User model, make sure the password column is at least 60 characters in length. Maintaining the default string column length of 255 characters would be a good choice.

Also, you should verify that your users (or equivalent) table contains a nullable, string remember_token column of 100 characters. This column will be used to store a token for users that select the "remember me" option when logging into your application.


## Authentication Quickstart

Laravel ships with several pre-built authentication controllers, which are located in the App\Http\Controllers\Auth namespace. The RegisterController handles new user registration, the LoginController handles authentication, the ForgotPasswordController handles e-mailing links for resetting passwords, and the ResetPasswordController contains the logic to reset passwords. Each of these controllers uses a trait to include their necessary methods. For many applications, you will not need to modify these controllers at all.

### Routing
Laravel's laravel/ui package provides a quick way to scaffold all of the routes and views you need for authentication using a few simple commands:

    composer require laravel/ui --dev

    php artisan ui vue --auth

This command should be used on fresh applications and will install a layout view, registration and login views, as well as routes for all authentication end-points. A HomeController will also be generated to handle post-login requests to your application's dashboard.

If your application doesn’t need registration, you may disable it by removing the newly created RegisterController and modifying your route declaration: 

    Auth::routes(['register' => false]);.


#### Creating Apps with Authentication
If you are starting a brand new application and would like to include the authentication scaffolding, you may use the --auth directive when creating your application. This command will create a new application with all of the authentication scaffolding compiled and installed:

    laravel new blog --auth

### Views
As mentioned in the previous section, the laravel/ui package's php artisan ui vue --auth command will create all of the views you need for authentication and place them in the resources/views/auth directory.

The ui command will also create a resources/views/layouts directory containing a base layout for your application. All of these views use the Bootstrap CSS framework, but you are free to customize them however you wish.


### Authenticating
Now that you have routes and views setup for the included authentication controllers, you are ready to register and authenticate new users for your application! You may access your application in a browser since the authentication controllers already contain the logic (via their traits) to authenticate existing users and store new users in the database.


#### Path Customization
When a user is successfully authenticated, they will be redirected to the /home URI. You can customize the post-authentication redirect location by defining a redirectTo property on the LoginController, RegisterController, ResetPasswordController, and VerificationController:

    protected $redirectTo = '/';

Next, you should modify the RedirectIfAuthenticated middleware's handle method to use your new URI when redirecting the user.

If the redirect path needs custom generation logic you may define a redirectTo method instead of a redirectTo property:

    protected function redirectTo()
    {
        return '/path';
    }

The redirectTo method will take precedence over the redirectTo property.


#### Username Customization
By default, Laravel uses the email field for authentication. If you would like to customize this, you may define a username method on your LoginController:

    public function username()
    {
        return 'username';
    }


#### Guard Customization
You may also customize the "guard" that is used to authenticate and register users. To get started, define a guard method on your LoginController, RegisterController, and ResetPasswordController. The method should return a guard instance:

    use Illuminate\Support\Facades\Auth;

    protected function guard()
    {
        return Auth::guard('guard-name');
    }


#### Validation/Storage Customization
To modify the form fields that are required when a new user registers with your application, or to customize how new users are stored into your database, you may modify the RegisterController class. This class is responsible for validating and creating new users of your application.

The validator method of the RegisterController contains the validation rules for new users of the application. You are free to modify this method as you wish.

The create method of the RegisterController is responsible for creating new App\User records in your database using the Eloquent ORM. You are free to modify this method according to the needs of your database.


### Retrieving The Authenticated User


#### Determining If The Current User Is Authenticated




### Protecting Routes

Route middleware can be used to only allow authenticated users to access a given route.

Laravel ships with an auth middleware, which is defined at `Illuminate\Auth\Middleware\Authenticate`.

Since this middleware is already registered in your HTTP kernel, all you need to do is attach the middleware to a route definition.

```php
Route::get('profile', function () {
  // Only authenticated users may enter...
})->middleware('auth');
```

If you are using controllers, you may call the middleware method from the controller's constructor instead of attaching it in the route definition directly.

```php
public function __construct()
{
  $this->middleware('auth');
}
```


#### Redirecting Unauthenticated Users
When the auth middleware detects an unauthorized user, it will redirect the user to the login named route. You may modify this behavior by updating the redirectTo function in your app/Http/Middleware/Authenticate.php file:

```php
/**
 * Get the path the user should be redirected to.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return string
 */
protected function redirectTo($request)
{
    return route('login');
}
```


#### Specifying A Guard
When attaching the auth middleware to a route, you may also specify which guard should be used to authenticate the user.

The guard specified should correspond to one of the keys in the guards array of your `auth.php` configuration file:

```php
public function __construct()
{
  $this->middleware('auth:api');
}
```



### Password Confirmation




### Login Throttling




## Manually Authenticating Users
