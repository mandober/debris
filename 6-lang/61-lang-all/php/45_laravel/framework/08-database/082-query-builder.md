# Database: Query Builder

https://laravel.com/docs/master/queries

Introduction
Retrieving Results
  Chunking Results
  Aggregates
Selects
Raw Expressions
Joins
Unions
Where Clauses
Parameter Grouping
Where Exists Clauses
  JSON Where Clauses
  Ordering, Grouping, Limit & Offset
  Conditional Clauses
Inserts
Updates
  Updating JSON Columns
  Increment & Decrement
Deletes
Pessimistic Locking
Debugging



## Introduction

If you must allow the user to select certain columns to query against, always validate the column names against a white-list of allowed columns.

## Retrieving Results

## Retrieving All Rows From A Table

You may use the `DB::table` to begin a query. The `table` method returns a fluent query builder instance for the given table, allowing you to chain more constraints onto the query and then finally get the results using the `get` method, which returns an `Illuminate\Support\Collection` containing the results where each result is an instance of the PHP `stdClass` object. You may access each column's value by accessing the column as a property of the object.

```php
$users = DB::table('users')->get();
foreach ($users as $user) { echo $user->name; }

// to retrieve a single row use first() which returns a single stdClass obj:
$user = DB::table('users')->where('name', 'John')->first();
echo $user->name;

// If you don't need an entire row, extract a single value from a record using value(). This method will return the value of the column directly:
$email = DB::table('users')->where('name', 'John')->value('email');

// To retrieve a single row by its id column value use find():
$user = DB::table('users')->find(3);

// to retrieve Collection containing the values of a single col, use pluck()
$titles = DB::table('roles')->pluck('title');
foreach ($titles as $title) { echo $title; }

// You may specify a custom key column for the returned Collection:
$roles = DB::table('roles')->pluck('title', 'name');
foreach ($roles as $name => $title) { echo $title; }

// For large dataset use chunk(). It retrieves a small chunk of the results
// at a time and feeds each chunk into a Closure for processing.
DB::table('users')->orderBy('id')->chunk(100, function ($users) {
  foreach ($users as $user) { /* ... */ }
});

// stop processing further chunks by returning false from Closure:
DB::table('users')->orderBy('id')->chunk(100, function ($users) {
    // Process the records...then:
    return false;
});

// when updating records while chunking, it is best to use chunkById()
// It automatically paginates results based on the record's primary key:
DB::table('users')->where('active', false)
    ->chunkById(100, function ($users) {
        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['active' => true]);
        }
    });
```

> When updating or deleting records inside the chunk callback, any changes to the primary key or foreign keys could affect the chunk query. This could potentially result in records not being included in the chunked results.


## Aggregates

```php
// aggregate methods such as count, max, min, avg, and sum.
// You may call any of these methods after constructing your query:
$users = DB::table('users')->count();
$price = DB::table('orders')->max('price');

// You may combine these methods with other clauses:
$price = DB::table('orders')
                ->where('finalized', 1)
                ->avg('price');

// to determine if any records exist that match your query's constraints
// use exists() and doesntExist() instead of count
return DB::table('orders')->where('finalized', 1)->exists();
return DB::table('orders')->where('finalized', 1)->doesntExist();
```

## Selects

## Specifying A Select Clause

You may not always want to select all columns from a database table. Using the `select` method, you can specify a custom select clause for the query:

```php
$users = DB::table('users')->select('name', 'email as user_email')->get();

// The distinct method allows you to force the query to return distinct results:
$users = DB::table('users')->distinct()->get();

// If you already have query builder and you wish to add a column
// to its existing select clause, use addSelect()
$query = DB::table('users')->select('name');
$users = $query->addSelect('age')->get();
```


## Raw Methods

To create a raw expression, you may use the `DB::raw` method:

```php
$users = DB::table('users')
                     ->select(DB::raw('count(*) as user_count, status'))
                     ->where('status', '<>', 1)
                     ->groupBy('status')
                     ->get();
```

> Raw statements will be injected into the query as strings, so you should be extremely careful to not create SQL injection vulnerabilities.


Instead of using `DB::raw`, you may also use the following methods to insert a raw expression into various parts of your query.
- selectRaw
- whereRaw, orWhereRaw
- havingRaw, orHavingRaw
- orderByRaw



The **selectRaw** method can be used in place of addSelect(DB::raw(...)). This method accepts an optional array of bindings as its second argument:

```php
$orders = DB::table('orders')
  ->selectRaw('price * ? as price_with_tax', [1.0825])->get();
```

The **whereRaw** and **orWhereRaw** methods can be used to inject a raw where clause into your query. These methods accept an optional array of bindings as their second argument:

```php
$orders = DB::table('orders')
  ->whereRaw('price > IF(state = "TX", ?, 100)', [200])->get();
```

The **havingRaw** and **orHavingRaw** methods may be used to set a raw string as the value of the having clause. These methods accept an optional array of bindings as their second argument:

```php
$orders = DB::table('orders')
        ->select('department', DB::raw('SUM(price) as total_sales'))
        ->groupBy('department')
        ->havingRaw('SUM(price) > ?', [2500])
        ->get();
```

The **orderByRaw** method may be used to set a raw string as the value of the order by clause:

```php
$orders = DB::table('orders')
        ->orderByRaw('updated_at - created_at DESC')
        ->get();
```


## Joins





## Unions

The query builder also provides a quick way to "union" two queries together.

For example, you may create an initial query and use the **union** method to union it with a second query:

```php
$first = DB::table('users')
            ->whereNull('first_name');

$users = DB::table('users')
            ->whereNull('last_name')
            ->union($first)
            ->get();
```

The **unionAll** method is also available and has the same method signature as union.


## Where Clauses


```php
$users = DB::table('users')->where('votes', '=', 100)->get();

// if you want to verify that a column is equal to a given value, you may pass the value directly as the second argument to the where method:
$users = DB::table('users')->where('votes', 100)->get();

// You may use a variety of other operators when writing a where clause:
$users = DB::table('users')->where('votes', '>=', 100)->get();
$users = DB::table('users')->where('votes', '<>', 100)->get();
$users = DB::table('users')->where('name', 'like', 'T%')->get();

// You may also pass an array of conditions to the where function:
$users = DB::table('users')->where([
    ['status', '=', '1'],
    ['subscribed', '<>', '1'],
])->get();

// You may chain where constraints together as well as add or clauses to the query. The orWhere method accepts the same arguments as the where method:
$users = DB::table('users')
        ->where('votes', '>', 100)
        ->orWhere('name', 'John')
        ->get();

// The whereBetween method verifies that a column's value is between values:
$users = DB::table('users')->whereBetween('votes', [1, 100])->get();

// whereNotBetween verifies that a column's value lies outside of values:
$users = DB::table('users')->whereNotBetween('votes', [1, 100])->get();

// whereNotIn verifies that given value is not contained in the array:
$users = DB::table('users')->whereNotIn('id', [1, 2, 3])->get();

// The whereNull method verifies that the value of the given column is NULL:
$users = DB::table('users')->whereNull('updated_at')->get();

// The whereNotNull method verifies that the column's value is not NULL:
$users = DB::table('users')->whereNotNull('updated_at')->get();

// whereDate / whereMonth / whereDay / whereYear / whereTime

// whereDate may be used to compare a column's value against a date:
$users = DB::table('users')->whereDate('created_at', '2016-12-31')->get();

// whereMonth to compare a value against a specific month of a year:
$users = DB::table('users')->whereMonth('created_at', '12')->get();

// whereDay to compare a column's value against a specific day of a month:
$users = DB::table('users')->whereDay('created_at', '31')->get();

// whereYear may be used to compare a column's value against a specific year:
$users = DB::table('users')->whereYear('created_at', '2016')->get();

// whereTime may be used to compare a column's value against a specific time:
$users = DB::table('users')->whereTime('created_at', '=', '11:20:45')->get();


// whereColumn / orWhereColumn

// whereColumn method may be used to verify that two columns are equal:
$users = DB::table('users')->whereColumn('first_name', 'last_name')->get();

// You may also pass a comparison operator to the method:
$users = DB::table('users')->whereColumn('updated_at','>','created_at')->get();

// whereColumn method can also be passed an array of multiple conditions. These conditions will be joined using the and operator:
$users = DB::table('users')
                ->whereColumn([
                    ['first_name', '=', 'last_name'],
                    ['updated_at', '>', 'created_at'],
                ])->get();
```


## Parameter Grouping

Sometimes you may need to create more advanced where clauses such as "where exists" clauses or nested parameter groupings. The Laravel query builder can handle these as well. To get started, let's look at an example of grouping constraints within parenthesis:

```php
$users = DB::table('users')
           ->where('name', '=', 'John')
           ->where(function ($query) {
               $query->where('votes', '>', 100)
                     ->orWhere('title', '=', 'Admin');
           })
           ->get();
```

As you can see, passing a Closure into the where method instructs the query builder to begin a constraint group. The Closure will receive a query builder instance which you can use to set the constraints that should be contained within the parenthesis group.

The example above will produce the following SQL:   
`select * from users where name = 'John' and (votes > 100 or title = 'Admin')`

You should always group **orWhere** calls in order to avoid unexpected behavior when global scopes are applied.


## Where Exists Clauses

The **whereExists** method allows you to write where exists SQL clauses. The whereExists method accepts a Closure argument, which will receive a query builder instance allowing you to define the query that should be placed inside of the "exists" clause:

```php
$users = DB::table('users')
           ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('orders')
                     ->whereRaw('orders.user_id = users.id');
           })
           ->get();
```

The query above will produce the following SQL:

```sql
select * from users
where exists (
  select 1 from orders where orders.user_id = users.id
)
```

## JSON Where Clauses

Laravel also supports querying JSON column types on databases that provide support for JSON column types. Currently, this includes **MySQL 5.7**, PostgreSQL, SQL Server 2016, and SQLite 3.9.0 (with the JSON1 extension).

To query a JSON column, use the `->` operator:

```php
$users = DB::table('users')->where('options->language','en')->get();
$users = DB::table('users')->where('preferences->dining->meal','salad')->get();

// use whereJsonContains to query JSON arrays (not supported on SQLite):
$users = DB::table('users')->whereJsonContains('options->lang','en')->get();

// MySQL and PostgreSQL support whereJsonContains with multiple values:
$users = DB::table('users')->whereJsonContains('opt->lan',['en','de'])->get();

// You may use whereJsonLength to query JSON arrays by their length:
$users = DB::table('users')->whereJsonLength('options->lang', 0)->get();
$users = DB::table('users')->whereJsonLength('options->lang','>', 1)->get();
```
