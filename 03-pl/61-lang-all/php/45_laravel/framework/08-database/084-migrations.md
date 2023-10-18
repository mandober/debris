# DB: Migrations

* Introduction
* Generating Migrations
* Migration Structure
* Running Migrations
  - Rolling Back Migrations
* Tables
  - Creating Tables
  - Renaming/Dropping Tables
* Columns
  - Creating Columns
  - Column Modifiers
  - Modifying Columns
  - Dropping Columns
* Indexes
  - Creating Indexes
  - Renaming Indexes
  - Dropping Indexes
  - Foreign Key Constraints


## Introduction

Migrations are like version control for your database, allowing your team to easily modify and share the application's database schema.

Migrations are typically paired with Laravel's schema builder to easily build your application's database schema.

The Laravel `Schema` facade provides database agnostic support for creating and manipulating tables across all of Laravel's supported db systems.


## Generating Migrations

To create a migration: `php artisan make:migration create_users_table`

The new migration will be placed in your `database/migrations` directory. Each migration file name contains a timestamp which allows Laravel to determine the order of the migrations.

The `--table` and `--create` options indicate the name of the table and whether the migration will be creating a new table (or altering an existing). To specify custom output path use `--path` option.


## Migration Structure

A migration class contains two methods: up and down:
* `up` method is used to add new tables, columns, indexes to db.
* `down` method should reverse the operations performed by the `up` method.

Within both methods you may use Schema builder to create and modify tables.

For example, this migration example creates a `flights` table:

```php
public function up()
{
  Schema::create('flights', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('name');
    $table->string('airline');
    $table->timestamps();
  });
}
```

## Running Migrations

To run all of your outstanding migrations, execute the migrate Artisan command:

`php artisan migrate`

Force Running Migrations:    
Some migration operations are destructive, which means they may cause you to lose data. In order to protect you from running these commands against your production database, you will be prompted for confirmation before the commands are executed. To force the commands to run without a prompt, use the --force flag:

`php artisan migrate --force`


## Rolling Back Migrations

To rollback the latest migration operation, use:

`php artisan migrate:rollback`

This command rolls back the last "batch" of migrations, which may include multiple migration files. You may rollback a limited number of migrations by providing the `--step` option.

The `migrate:reset` command rolls back all migrations. The `migrate:refresh` command will roll back all of your migrations and then execute the migrate command (empties then recreates entire db). The `migrate:fresh` command will drop all tables from the database and then execute the migrate command.


## Tables

### Creating Tables

To create a new database table, use `Schema::create` method, which accepts two arguments: the name of the table and a Closure which receives a Blueprint object that may be used to define the new table.

```php
Schema::create('users', function (Blueprint $table) {
  $table->bigIncrements('id');
});
```

When creating the table, you may use any of the schema builder's `column` methods to define the table's columns.

#### Checking For Table or Column Existence
You may easily check for the existence of a table or column using the `hasTable` and `hasColumn` methods:

```php
if (Schema::hasTable('users')) {}

if (Schema::hasColumn('users', 'email')){}
```


#### Database Connection and Table Options

If you want to perform a schema operation on a database connection that is not your default connection, use the connection method:

```php
Schema::connection('foo')->create('users', function (Blueprint $table) {
  $table->bigIncrements('id');
});
```

You may use the following commands on the schema builder to define the table's options:

```php
// Specify the table storage engine (MySQL)
$table->engine = 'InnoDB';

// Specify a default character set for the table (MySQL)
$table->charset = 'utf8';

// Specify a default collation for the table (MySQL)
$table->collation = 'utf8_unicode_ci';

// Create a temporary table (except SQL Server)
$table->temporary();
```

#### Renaming and Dropping Tables
To rename an existing database table, use the `rename` method:

```php
Schema::rename($from, $to);

// To drop an existing table, you may use the drop or dropIfExists methods:
Schema::drop('users');
Schema::dropIfExists('users');
```

#### Renaming Tables With Foreign Keys

> Before renaming a table, you should verify that any foreign key constraints on the table have an explicit name in your migration files instead of letting Laravel assign a convention based name. Otherwise, the foreign key constraint name will refer to the old table name.


## Columns

### Creating Columns
The `Schema::table` method may be used to update existing tables, that accepts two arguments: the name of the table and a Closure that receives a Blueprint instance you may use to add columns to the table.

```php
Schema::table('users', function (Blueprint $table) {
    $table->string('email');
});
```


### Available Column Types

The schema builder contains a variety of column types that you may specify when building your tables:

https://laravel.com/docs/master/migrations#creating-columns


```php
// Auto-incrementing UNSIGNED BIGINT equivalent column. For PK
$table->bigIncrements('id');

// BIGINT equivalent column. For FK linking to PK like above
$table->bigInteger('votes');

// BLOB equivalent column
$table->binary('data');

// BOOLEAN equivalent column (becomes TinyInteger in mysql)
$table->boolean('confirmed');

// CHAR equivalent column with an optional length.
$table->char('name', 100);

// DATE equivalent column
$table->date('created_at');

// DATETIME equivalent column
$table->dateTime('created_at');

// DATETIME (with timezone) equivalent column
$table->dateTimeTz('created_at');

// DECIMAL equivalent column with precision (total digits) and scale
$table->decimal('amount', 8, 2);

// DOUBLE equivalent column with a precision (total digits) and scale
$table->double('amount', 8, 2);

// ENUM equivalent column
$table->enum('level', ['easy', 'hard']);

// FLOAT equivalent column with a precision (total digits) and scale
$table->float('amount', 8, 2);

// GEOMETRY equivalent column
$table->geometry('positions');

// GEOMETRYCOLLECTION equivalent column
$table->geometryCollection('positions');

// Auto-incrementing UNSIGNED INTEGER (primary key) equivalent column
$table->increments('id');

// INTEGER equivalent column
$table->integer('votes');

// IP address equivalent column
$table->ipAddress('visitor');

// JSON equivalent column
$table->json('options');

// JSONB equivalent column
$table->jsonb('options');

// LINESTRING equivalent column
$table->lineString('positions');

// LONGTEXT equivalent column
$table->longText('description');

// MAC address equivalent column
$table->macAddress('device');

// Auto-incrementing UNSIGNED MEDIUMINT (primary key) equivalent column.
$table->mediumIncrements('id');

// MEDIUMINT equivalent column
$table->mediumInteger('votes');

// MEDIUMTEXT equivalent column.
$table->mediumText('description');

// Adds taggable_id UNSIGNED BIGINT and taggable_type VARCHAR equivalent cols
$table->morphs('taggable');

// Adds taggable_id CHAR(36) and taggable_type VARCHAR(255) UUID equivalent cols
$table->uuidMorphs('taggable');

// MULTILINESTRING equivalent column.
$table->multiLineString('positions');

// MULTIPOINT equivalent column.
$table->multiPoint('positions');

// MULTIPOLYGON equivalent column.
$table->multiPolygon('positions');

// Adds nullable versions of morphs() columns.
$table->nullableMorphs('taggable');

// Adds nullable versions of uuidMorphs() columns.
$table->nullableUuidMorphs('taggable');

// Alias of timestamps() method.
$table->nullableTimestamps();

// POINT equivalent column.
$table->point('position');

// POLYGON equivalent column.
$table->polygon('positions');

// Adds a nullable remember_token VARCHAR(100) equivalent column.
$table->rememberToken();

// SET equivalent column.
$table->set('flavors', ['strawberry', 'vanilla']);

// Auto-incrementing UNSIGNED SMALLINT (primary key) equivalent column.
$table->smallIncrements('id');

// SMALLINT equivalent column.
$table->smallInteger('votes');

// Adds a nullable deleted_at TIMESTAMP equivalent column for soft deletes.
$table->softDeletes();

// nullable deleted_at TIMESTAMP (with TZ) equivalent column for soft deletes
$table->softDeletesTz();

// VARCHAR equivalent column with a optional length.
$table->string('name', 100);

// TEXT equivalent column.
$table->text('description');

// TIME equivalent column.
$table->time('sunrise');

// TIME (with timezone) equivalent column.
$table->timeTz('sunrise');

// TIMESTAMP equivalent column.
$table->timestamp('added_on');

// TIMESTAMP (with timezone) equivalent column.
$table->timestampTz('added_on');

// Adds nullable created_at and updated_at TIMESTAMP equivalent columns.
$table->timestamps();

// nullable created_at and updated_at TIMESTAMP (with TZ) equivalent columns.
$table->timestampsTz();

// Auto-incrementing UNSIGNED TINYINT (primary key) equivalent column.
$table->tinyIncrements('id');

// TINYINT equivalent column.
$table->tinyInteger('votes');

// UNSIGNED BIGINT equivalent column.
$table->unsignedBigInteger('votes');

// UNSIGNED DECIMAL equivalent column with a precision (total digits) and scale 
$table->unsignedDecimal('amount', 8, 2);

// UNSIGNED INTEGER equivalent column.
$table->unsignedInteger('votes');

// UNSIGNED MEDIUMINT equivalent column.
$table->unsignedMediumInteger('votes');

// UNSIGNED SMALLINT equivalent column.
$table->unsignedSmallInteger('votes');

// UNSIGNED TINYINT equivalent column.
$table->unsignedTinyInteger('votes');

// UUID equivalent column.
$table->uuid('id');

// YEAR equivalent column.
$table->year('birth_year');
```


### Column Modifiers

In addition to the column types listed above, there are several *column modifiers* you may use while adding a column to a database table. For example, to make the column *nullable*, you may use the nullable method:

```php
Schema::table('users', function (Blueprint $table) {
  $table->string('email')->nullable();
});
```

Below is a list of all the available column modifiers:

```php
// Place the column first in the table (MySQL)
->first()

// Place the column after another column (MySQL)
->after('column')



// CHARACTER SET (MySQL)
->charset('utf8')

// COLLATION (MySQL/PostgreSQL/SQL Server)
->collation('utf8_unicode_ci')

// Add a comment to a column (MySQL/PostgreSQL)
->comment('my comment')

// Set INTEGER as AUTO-INCREMENT (primary key)
->autoIncrement()

// Set INTEGER as UNSIGNED (MySQL)
->unsigned()

// Set DEFAULT VALUE
->default($value)

// Allows (by default) NULL to be inserted
->nullable($value = true)

// Create a stored generated column (MySQL)
->storedAs($expression)

// Create a virtual generated column (MySQL)
->virtualAs($expression)

// Set TIMESTAMP columns to use CURRENT_TIMESTAMP as default value
->useCurrent()

// Create an identity column with specified seq options (PostgreSQL)
->generatedAs($expression)

// Defines precedence of seq val over input for identity column (PostgreSQL)
->always()
```


### Default Expressions

Default modifier accepts a value or an `\Illuminate\Database\Query\Expression` instance. Using an `Expression` instance will prevent wrapping the value in quotes and allow you to use db specific functions. One situation where this is particularly useful is assigning default values to JSON columns.

```php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
  public function up()
  {
    Schema::create('flights', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->json('movies')->default(new Expression('(JSON_ARRAY())'));
      $table->timestamps();
    });
  }
}
```


## Modifying Columns


### Prerequisites
Before modifying a column, add the package: `composer require doctrine/dbal`.

The Doctrine DBAL library is used to determine the current state of the column and create the SQL queries needed to make the specified adjustments to the column.


### Updating Column Attributes
The change method allows you to modify some existing column types to a new type or modify the column's attributes.

or example, you may wish to increase the size of a string column. To see the change method in action, let's increase the size of the name column from 25 to 50:

```php
Schema::table('users', function (Blueprint $table) {
    $table->string('name', 50)->change();
});


// We could also modify a column to be nullable:
Schema::table('users', function (Blueprint $table) {
    $table->string('name', 50)->nullable()->change();
});
```

Only the following column types can be *changed*:
- binary
- boolean
- smallInteger, unsignedSmallInteger
- integer,      unsignedInteger
- bigInteger,   unsignedBigInteger
- decimal
- time, date, dateTime, dateTimeTz
- string, mediumText, text, longText
- json


### Renaming Columns
To rename a column, use `Schema::renameColumn` method (be sure to add the doctrine/dbal dependency).

```php
Schema::table('users', function (Blueprint $table) {
    $table->renameColumn('from', 'to');
});
```

> Renaming any column in a table that also has a column of type enum is not currently supported.

### Dropping Columns
To drop a column, use `Schema::dropColumn` method (be sure to add the doctrine/dbal dependency).

```php
Schema::table('users', function (Blueprint $table) {
    $table->dropColumn('votes');
});


// You may drop multiple columns from a table by passing an array
// of column names to the dropColumn method:
Schema::table('users', function (Blueprint $table) {
    $table->dropColumn(['votes', 'avatar', 'location']);
});
```

Dropping or modifying multiple columns within a single migration while using a SQLite database is not supported.


### Available Command Aliases

```php
// Drop the morphable_id and morphable_type columns
$table->dropMorphs('morphable');

// Drop the remember_token column
$table->dropRememberToken();

// Drop the deleted_at column
$table->dropSoftDeletes();

// Alias of dropSoftDeletes() method
$table->dropSoftDeletesTz();

// Drop the created_at and updated_at columns
$table->dropTimestamps();

// Alias of dropTimestamps() method
$table->dropTimestampsTz();
```


## Indexes


```php
// unique
$table->string('email')->unique();

// unique: create the index after defining the column
$table->unique('email');

// pass array of cols to create a compound index:
$table->index(['account_id', 'created_at']);

// Laravel automatically generates a reasonable index name, but
// you may pass the second arg to specify the index name:
$table->unique('email', 'unique_email');



// Adds a primary key.
$table->primary('id');

// Adds composite keys.
$table->primary(['id', 'parent_id']);

// Adds a unique index.
$table->unique('email');

// Adds a plain index.
$table->index('state');

// Adds a spatial index. (except SQLite)
$table->spatialIndex('location');
```


#### Index Lengths and MySQL
Laravel uses the `utf8mb4` character set by default, which includes support for storing emoji in the database.

If you are running a version of **MySQL older than the 5.7.7 release** or MariaDB older than the 10.2.2 release, you may need to manually configure the default string length generated by migrations in order for MySQL to create indexes for them.

You may configure this by calling the `Schema::defaultStringLength` method within your `AppServiceProvider`:

```php
use Illuminate\Support\Facades\Schema;

/**
 * Bootstrap any application services.
 *
 * @return void
 */
public function boot()
{
    Schema::defaultStringLength(191);
}
```


### Renaming Indexes
To rename an index, you may use the renameIndex method. This method accepts the current index name as its first argument and the desired name as its second argument:

```php
$table->renameIndex('from', 'to')
```


### Dropping Indexes

To drop an index, you must specify the **index name**. By default, Laravel creates an index name by concatenating the table name, the name of the indexed column and the index type, with underscore as the "glue". Examples:

```php
// Drop a primary key from the "users" table.
$table->dropPrimary('users_id_primary');

// Drop a unique index from the "users" table.
$table->dropUnique('users_email_unique');

// Drop a basic index from the "geo" table.
$table->dropIndex('geo_state_index');

// Drop a spatial index from the "geo" table (except SQLite).
$table->dropSpatialIndex('geo_location_spatialindex');
```


If you pass an array of columns into a method that drops indexes, the **index name** will be generated based on the table name, columns and key type:

```php
Schema::table('geo', function (Blueprint $table) {
  $table->dropIndex(['state']); // Drops index 'geo_state_index'
});
```


## Foreign Key Constraints
Laravel also provides support for creating foreign key constraints, which are used to force referential integrity at the database level.

For example, let's define a `user_id` column on the posts table that references the `id` column on a `users` table:

```php
Schema::table('posts', function (Blueprint $table) {
    $table->unsignedBigInteger('user_id');

    $table->foreign('user_id')->references('id')->on('users');
});
```


You may also specify the desired action for the "on delete" and "on update" properties of the constraint:

```php
$table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');
```


To drop a foreign key, you may use the `dropForeign` method.

Foreign key constraints use the same naming convention as indexes.

So, we will concatenate the table name and the columns in the constraint then suffix the name with `_foreign`:

```php
$table->dropForeign('posts_user_id_foreign');
```

Or, you may pass an array value which will automatically use the conventional constraint name when dropping:

```php
$table->dropForeign(['user_id']);

// enable or disable foreign key constraints in migration:
Schema::enableForeignKeyConstraints();
Schema::disableForeignKeyConstraints();
```


> SQLite disables foreign key constraints by default.
When using SQLite, make sure to enable foreign key support in your database configuration before attempting to create them in your migrations.
