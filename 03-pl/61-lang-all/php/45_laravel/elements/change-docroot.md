# Change document root

Laravel comes with hardcoded name for *docroot* (i.e. the root folder of the publically accessible folder hierarchy) with several files with code that depends on its name being `public`.

This is a problem because some hosting companies allow the necessary ssh access to manage laravel online, but disallow changing of docroot name from `public_html`.

Neither side is giving in, so try searching Google and getting into trouble with this "solutions" below (I did, but I didn't record the exact error, just moved on to find the working solution).

It seems **symlinks** are a way to go. It's not guaranteed to be the trouble-free method, but so far it's on the right path (ten-ish coding incident-free sessions).

Configuration #1 (works so far)
- all original laravel folders are as is, except `public` is linked to the same-level sibling `public_html` folder

Configuration #2 (which also seems to work)
- all laravel folders are in a dir called `lar`, which is on the same level as `public_html` folder
- the folder `lar/public` is symlinked to `../public_html`





---

## Change the name of the web-server's document root folder

> Not entirely sure if it works

NOTE: since Servage disallows changing the path to the public directory, Laravel's value must be changed: it has to be `public_html` instead of the Laravel's default, `public`.

https://stackoverflow.com/questions/30198669/how-to-change-public-folder-to-public-html-in-laravel-5

1. rename the folder `/public` to `/public_html`

2. open `/public_html/index.php` and add the line (after the bootstrap code):

```php
app = require_once __DIR__.'/../bootstrap/app.php';

// ADD THIS LINE:
// set the public path to `public_html` instead of the default `public`
$app->bind('path.public', fn() => __DIR__);
```

3. open `/app/Providers/RouteServiceProvider.php` and add line:

```php
public function register()
{
  // add this inside the empty register() method
  $this->app->bind('path.public', fn() => base_path('public_html'));
}
```

4. open `/server` and change all occurrences of `public` with `public_html`(there were just two).


5. open `/webpack.mix.js` and update:
If you're using *webpack* and *laravel-mix* to generate your css and js files then this also needs some update. Without tweaking `webpack.mix.js` thing are gonna be messed up on `npm run watch` or `npm run production`.

So you have to provide a public path to your `webpack.mix.js` file. This is going to change the default definition of public directory from `public` to `public_html` and the following lines provide a *relative path* to your *setPublicPath* value.

```js
const mix = require('laravel-mix');

mix.setPublicPath('public_html/');
mix.js('resources/js/app.js', 'js')
mix.sass('resources/sass/app.scss', 'css');
```
