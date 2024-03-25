# Authorization

https://laravel.com/docs/master/authorization

* Introduction
* Gates
  - Writing Gates
  - Authorizing Actions
  - Gate Responses
  - Intercepting Gate Checks
* Creating Policies
  - Generating Policies
  - Registering Policies
* Writing Policies
  - Policy Methods
  - Policy Responses
  - Methods Without Models
  - Guest Users
  - Policy Filters
* Authorizing Actions Using Policies
  - Via The User Model
  - Via Middleware
  - Via Controller Helpers
  - Via Blade Templates
  - Supplying Additional Context


## Introduction

Laravel provides a simple way to authorize user actions against a given resource. 

There are two primary ways of authorizing actions: gates and policies. Think of gates and policies like routes and controllers. Most applications will most likely contain a mixture of gates and policies.

**Gates** provide a simple, Closure based approach to authorization. Gates are most applicable to actions which are *not related to any model or resource*, such as viewing an administrator dashboard.

**Policies**, like controllers, *group their logic around a particular model* or resource. Policies should be used when you wish to authorize an action for a particular model or resource.


## Gates

### Writing Gates

Gates are Closures that determine if a user is authorized to perform a given action and are typically defined in the `App\Providers\AuthServiceProvider` class using the Gate facade.

> Gates always receive a user instance as their first argument, and may optionally receive additional arguments such as a relevant Eloquent model.

```php
public function boot()
{
    $this->registerPolicies();

    Gate::define('edit-settings', function ($user) {
        return $user->isAdmin;
    });

    Gate::define('update-post', function ($user, $post) {
        return $user->id === $post->user_id;
    });
}
```

Gates may also be defined using a `Class@method` style callback string, like controllers:

```php
public function boot()
{
    $this->registerPolicies();

    Gate::define('update-post', 'App\Policies\PostPolicy@update');
}
```


## Authorizing Actions

To authorize an action using gates, you should use the `allows` or `denies` methods.



If you would like to determine if a particular user is authorized to perform an action, you may use the `forUser` method on the `Gate` facade,


You may authorize multiple actions at a time with the `any` or `none` methods.
