# Eloquent ORM: Relationships

https://laravel.com/docs/master/eloquent-relationships

## Introduction

Eloquent supports several different types of relationships:
- One To One
- One To Many
- Many To Many
- Has One Through
- Has Many Through
- One To One (Polymorphic)
- One To Many (Polymorphic)
- Many To Many (Polymorphic)


## Defining Relationships

Relationships are defined as methods on your model classes.

Since (like Eloquent models) relationships also serve as query builders, defining them as methods provides method chaining and querying capabilities. For example, we may chain additional constraints on this posts relationship: 
`$user->posts()->where('active', 1)->get();`

## One To One

> (one) User has 1 Role AND (one) Role belongs to 1 User.

For example, each user may have only one role (i.e. no user may have more then one role). Inversely, each role is associated with only one user (i.e. no role may belong to more than one user).

> User hasOne (only one) Role

> Role belongTo (only one) User

To define this one-to-one relationship, we define the `role()` method on the `User` model which calls the `hasOne()` method and return its result. The (first) argument passed to `hasOne` is the name of the related model.

```php
namespace App;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public function role() {
    return $this->hasOne('App\Role');
  }
}
```

Once the relationship is defined, we may retrieve the related record using Eloquent's dynamic properties.

**Dynamic properties** allow you to access relationship methods as if they were properties defined on the model.

```php
$role = User::find(1)->role;
```


## One To Many

> (one) Post hasMany Comments

> (one) Comment belongTo (only one) Post
