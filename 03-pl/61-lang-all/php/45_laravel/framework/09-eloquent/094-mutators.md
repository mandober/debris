# Eloquent: Mutators

<!-- TOC -->

- [Introduction](#introduction)
- [Defining An Accessor](#defining-an-accessor)
- [Defining A Mutator](#defining-a-mutator)
- [Date Mutators](#date-mutators)
- [Date Formats](#date-formats)
- [Attribute Casting](#attribute-casting)
- [Array and JSON Casting](#array-and-json-casting)
- [Date Casting](#date-casting)

<!-- /TOC -->


## Introduction

**Accessors** and **mutators** allow you to *format Eloquent attribute values* when you retrieve or set them on model instances.

For example, you may want to use the Laravel encrypter to encrypt a value while it is stored in the database, and then automatically decrypt the attribute when you access it on an Eloquent model.

In addition to custom accessors and mutators, Eloquent can also *automatically cast date fields to Carbon instances* or even *cast text fields to JSON*.


## Defining An Accessor

To define an **accessor**, create a `getFooAttribute` *method* on your model where `Foo` is the camelCased name of the column you wish to access.

In this example, we'll define an accessor for the `first_name` attribute. 

> The accessor will automatically be called by Eloquent when attempting to retrieve the value of the `first_name` attribute.

```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
      # use PHP's native func to Title Case the value
      return ucfirst($value);
    }
}
```

The original value of the field is passed to the accessor, allowing you to manipulate it (here, to uppercase all initial letters).

To access the value of the accessor, you may access the `first_name` attribute on a model instance.

```php
$user = App\User::find(1);
$firstName = $user->first_name;
```

You may also use accessors to return possibly formated or computed values from existing attributes:

```php
/**
 * Get the user's full name.
 *
 * @return string
 */
public function getFullNameAttribute()
{
  return "{$this->first_name} {$this->last_name}";
}
```

If you would like these computed values to be added to the array / JSON representations of your model, you will need to append them:
https://laravel.com/docs/master/eloquent-serialization#appending-values-to-json




## Defining A Mutator

To define a mutator, define a `setFooAttribute` method on your model where `Foo` is the camelCased name of the column you wish to access.

We can define a mutator for the `first_name` attribute that will be automatically called when we attempt to set the value of the `first_name` attribute on the model.

```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }
}
```

The mutator will receive the value that is being set on the attribute, allowing you to manipulate the value and set the manipulated value on the Eloquent model's internal `$attributes` property.

So, for example, if we attempt to set the `first_name` attribute to "Sally":

```php
$user = App\User::find(1);

$user->first_name = 'Sally';
```

In this example, the `setFirstNameAttribute` function will be called with the value "Sally". The mutator will then apply the `strtolower` function to the name and set its resulting value in the internal `$attributes` array.





## Date Mutators

By default, Eloquent will convert the `created_at` and `updated_at` columns to instances of *Carbon*, which extends the PHP `DateTime` class and provides an assortment of helpful methods.

You may add additional date attributes by setting the `$dates` property of your model.

```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [ 'seen_at' ];
}
```

You may disable the default `created_at` and `updated_at` timestamps by setting the public `$timestamps` property of your model to `false`.


When a column is considered a date, you may set its value to:
- a UNIX timestamp
- date string (Y-m-d)
- date-time string
- DateTime instance
- Carbon instance

and the date's value will be correctly converted and stored in your database.

```php
$user = App\User::find(1);
$user->deleted_at = now();
$user->save();
```


As noted above, when retrieving attributes that are listed in your `$dates` property, they will automatically be cast to Carbon instances, allowing you to use any of Carbon's methods on your attributes.

```php
$user = App\User::find(1);
return $user->deleted_at->getTimestamp();
```



## Date Formats

By default, timestamps are formatted as `Y-m-d H:i:s`. If you need to customize the timestamp format, set the `$dateFormat` property on your model.

> This property determines how date attributes are stored in the database, as well as their format when the model is serialized to an array or JSON.

```php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';
}
```


## Attribute Casting

The `$casts` property on your model provides a convenient method of converting attributes to common data types. The `$casts` property should be an array where the key is the name of the attribute being cast and the value is the type you wish to cast the column to.

The supported cast types are:
- integer
- real
- float
- double
- decimal:<digits>
- string
- boolean
- object
- array
- collection
- date
- datetime
- timestamp

When casting to decimal, you must define the number of digits, `decimal:2`.

To demonstrate attribute casting, let's cast the `is_admin` attribute, which is stored in our database as an integer (0 or 1) to a boolean value:

```php
namespace App;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [ 'is_admin' => 'boolean'];
}
```

Now the `is_admin` attribute will always be cast to a *boolean* when you access it, **even if the underlying value is stored in the database as an integer**.

```php
$user = App\User::find(1);
if ($user->is_admin) {/* cuz it is a bool */}
```


## Array and JSON Casting

The array cast type is particularly useful when working with columns that are stored as serialized JSON.

For example, if your database has a JSON or TEXT field type that contains serialized JSON, *adding the array cast to that attribute will automatically deserialize the attribute to a PHP array when you access it on your Eloquent model*.

```php
namespace App;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];
}
```

Once the cast is defined, you may access the *options attribute* and it will automatically be deserialized from JSON into a PHP array.

When you set the value of the options attribute, the given array will automatically be serialized back into JSON for storage.

```php
$user = App\User::find(1);
$options = $user->options;
$options['key'] = 'value';
$user->options = $options;
$user->save();
```


## Date Casting

When using the `date` or `datetime` cast type, you may specify the date's format. This format will be used when the model is serialized to an array or JSON:

```php
/**
 * The attributes that should be cast to native types.
 *
 * @var array
 */
protected $casts = [
    'created_at' => 'datetime:Y-m-d',
];
```
