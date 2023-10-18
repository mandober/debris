# artisan

artisan cmd in Laravel Framework 6.6.2

command [options] <arguments>

## Options

    --env[=ENV]       env the command should run under (dev, prod, etc.)
-n, --no-interaction  Do not ask any interactive question
    --ansi            Force ANSI output
    --no-ansi         Disable ANSI output
-h, --help            Display this help message
-V, --version         Display this application version
-q, --quiet           Do not output any message
-v, --verbose Increase the verbosity of messages:
-v for normal output, -vv for verbose, -vvv debug


## Commands

maintenance
down                 Put the app into maintenance mode
up                   Bring it back


list                 Lists commands
clear-compiled       Remove the compiled class file
env                  Display the current framework environment
help                 Displays help for a command
inspire              Display an inspiring quote
migrate              Run the database migrations
optimize             Cache the framework bootstrap files
preset               Swap the front-end scaffolding for the application
serve                Serve the application on the PHP development server
tinker               Interact with your application
ui                   Swap the front-end scaffolding for the application

auth
auth:clear-resets    Flush expired password reset tokens

cache
cache:clear          Flush the application cache
cache:forget         Remove an item from the cache
cache:table          Create a migration for the cache database table

config
config:cache         Create a cache file for faster configuration loading
config:clear         Remove the configuration cache file

db
db:seed              Seed the database with records
db:wipe              Drop all tables, views, and types

event
event:cache          Discover and cache the application's events and listeners
event:clear          Clear all cached events and listeners
event:generate       Generate the missing events and listeners based on registration
event:list           List the application's events and listeners

key
key:generate         Set the application key

make
make:channel         Create a new channel class
make:command         Create a new Artisan command
make:controller      Create a new controller class
make:event           Create a new event class
make:exception       Create a new custom exception class
make:factory         Create a new model factory
make:job             Create a new job class
make:listener        Create a new event listener class
make:mail            Create a new email class
make:middleware      Create a new middleware class
make:migration       Create a new migration file
make:model           Create a new Eloquent model class
make:notification    Create a new notification class
make:observer        Create a new observer class
make:policy          Create a new policy class
make:provider        Create a new service provider class
make:request         Create a new form request class
make:resource        Create a new resource
make:rule            Create a new validation rule
make:seeder          Create a new seeder class
make:test            Create a new test class

migrate
migrate:fresh        Drop all tables and re-run all migrations
migrate:install      Create the migration repository
migrate:refresh      Reset and re-run all migrations
migrate:reset        Rollback all database migrations
migrate:rollback     Rollback the last database migration
migrate:status       Show the status of each migration

notifications
notifications:table  Create a migration for the notifications table

optimize
optimize:clear       Remove the cached bootstrap files

package
package:discover     Rebuild the cached package manifest

queue
queue:failed         List all of the failed queue jobs
queue:failed-table   Create a migration for the failed queue jobs database table
queue:flush          Flush all of the failed queue jobs
queue:forget         Delete a failed queue job
queue:listen         Listen to a given queue
queue:restart        Restart queue worker daemons after their current job
queue:retry          Retry a failed queue job
queue:table          Create a migration for the queue jobs database table
queue:work           Start processing jobs on the queue as a daemon

route
route:cache          Create a route cache file for faster route registration
route:clear          Remove the route cache file
route:list           List all registered routes

schedule
schedule:run         Run the scheduled commands

session
session:table        Create a migration for the session database table

storage
storage:link         Create a symbolic link from "public/storage" to "storage/app/public"

ui
ui:auth              Scaffold basic login and registration views and routes

vendor
vendor:publish       Publish any publishable assets from vendor packages

view
view:cache           Compile all of the application's Blade templates
view:clear           Clear all compiled view files
