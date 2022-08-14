# Views

Views contain the HTML served by your application.
Views are stored in the resources/views directory.
view stored in under the default location `resources/views/greeting.blade.php`
may be return using the global `view()` helper:
    return view('greeting', ['name' => 'James']);

The first arg is the name of the view file in the default dir.
The second arg is an array of data that should be made available to the view.
Dot notation may be used to reference views nested under the default dir.

To see if a view exists use `View` facade; `exists()` returns `true` if it does.

Use `first()` method to use the first view that exists in given array of views.
Useful if your app allows views to be customized or overwritten.
    return view()->first(['custom.admin', 'admin'], $data);
or call this method via the `View` facade:
    use Illuminate\Support\Facades\View;
    return View::first(['custom.admin', 'admin'], $data);

You may pass an array of data to views:
    return view('greetings', ['name' => 'Victoria']);
When passing information in this manner, the data should be an array with k/v
pairs. Inside your view, you can then access each value using its key.
or use `with()` to add individual pieces of data to the view:
    return view('greeting')->with('name', 'Victoria');


## Sharing Data With All Views

To share a piece of data with all views, use `View::share` method.
Typically, you should place calls to share within a service provider's `boot()`
method in e.g. `AppServiceProvider`, or generate a separate SP to house them.

```php
namespace App\Providers;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('key', 'value');
    }
}
```


## View Composers

**View composers** are callbacks or class methods that are called when a view is
rendered. If you have data that you want to be bound to a view each time that
view is rendered, a view composer can help you organize.

For this example, let's register the *view composers* within a SP; using the
`View` to access the underlying `Illuminate\Contracts\View\Factory` contract
implementation.

Laravel does not include a default directory for view composers.
You are free to organize them however you wish.
For example, you could create an `app/Http/View/Composers` directory:

```php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'profile', 'App\Http\View\Composers\ProfileComposer'
        );

        // Using Closure based composers...
        View::composer('dashboard', function ($view) {
            //
        });
    }
}
```

> If you create a new service provider, you need to add it to the providers
> array in the `config/app.php` file.

Now that we have registered the composer, the `ProfileComposer@compose` method 
will be executed each time the profile view is being rendered.

So, let's define the composer class:

```php
namespace App\Http\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;

class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        // Dependencies automatically resolved by service container...
        $this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', $this->users->count());
    }
}
```

Just before the view is rendered, the composer's `compose` method is called with 
the `Illuminate\View\View` instance. You may use the `with` method to bind 
data to the view. All view composers are resolved via the service container, so 
you may type-hint any dependencies you need within a composer's constructor.

