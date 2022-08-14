# Database Testing

* Introduction
* Generating Factories
* Resetting The Database After Each Test
* Writing Factories
  - Factory States
  - Factory Callbacks
* Using Factories
  - Creating Models
  - Persisting Models
  - Relationships
* Using Seeds
* Available Assertions



## Writing Factories

Instead of manually specifying the value of each column when testing you can create this test data using model factories. 

Out of the box comes `database/factories/UserFactory.php`.

https://github.com/fzaninotto/Faker

You can set the *Faker* locale by adding a `faker_locale` option to your `config/app.php` configuration file.

All of the files within the factories directory will automatically be loaded by Laravel.

Once you have defined your factories, you may use the global `factory` function in your tests or seed files to generate model instances.

* `make()` creates instances
* `create()` creates and saves instances to db


You may override attributes on the model by passing an array to the create method:

```php
$user = factory(App\User::class)->create([
  'name' => 'Abigail',
]);
```


## Factories and Relationships

In this example, we'll attach a relation to some models. When using the `create` method to create multiple models, an Eloquent collection instance is returned, allowing you to use any of the convenient functions provided by the collection, such as `each`:

```php
$users = factory(App\User::class, 3)
  ->create()
  ->each(
    fn($user) =>
       $user->posts()
            ->save(factory(App\Post::class)->make())
  );

// You may use the createMany method to create multiple related models:
$user->posts()
     ->createMany(
        factory(App\Post::class, 3)
          ->make()
          ->toArray()
      );
```


## Relations and Attribute Closures

You may also attach relationships to models in your factory definitions. For example, if you would like to create a new `User` instance when creating a `Post`, you may do the following:

```php
$factory->define(App\Post::class, fn ($faker) =>
  [
    'title'   => $faker->title,
    'content' => $faker->paragraph,
    'user_id' => factory(App\User::class),
  ]
);
```

If the *relationship depends on the factory that defines it* you may provide a callback which accepts the evaluated attribute array:

```php
$factory->define(App\Post::class, fn ($faker) =>
  [
    'title'     => $faker->title,
    'content'   => $faker->paragraph,
    'user_id'   => factory(App\User::class),
    'user_type' => fn (array $post) => App\User::find($post['user_id'])->type,
  ]
);
```

## Using Seeds

If you would like to use database seeders to populate your database during a test, you may use the `seed` method.

By default, the `seed` method will return the `DatabaseSeeder`, which should *execute all seeders*. Alternatively, you pass a specific seeder class name to the `seed` method:

```php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use OrderStatusesTableSeeder;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testCreatingANewOrder()
    {
        // Run the DatabaseSeeder...
        $this->seed();
        // Run a single seeder...
        $this->seed(OrderStatusesTableSeeder::class);
    }
}
```


## Available Assertions

Laravel provides several database assertions for your PHPUnit tests:

```php
// Assert that a table in the database contains the given data
$this->assertDatabaseHas($table, array $data);

// Assert that a table in the database does not contain the given data
$this->assertDatabaseMissing($table, array $data);

// Assert that the given record has been deleted
$this->assertDeleted($table, array $data);

// Assert that the given record has been soft deleted
$this->assertSoftDeleted($table, array $data);
```


For convenience, you may pass a model to the `assertDeleted` and `assertSoftDeleted` helpers to assert the record was deleted or soft deleted, respectively, from the database based on the model's primary key.

For example, if you are using a model factory in your test, you may pass this model to one of these helpers to test your application properly deleted the record from the database:

```php
public function testDatabase()
{
    $user = factory(App\User::class)->create();
    // Make call to application...
    $this->assertDeleted($user);
}
```
