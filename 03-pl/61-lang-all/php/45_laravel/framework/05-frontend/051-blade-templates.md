# Blade Templates

- create the master page filled with strategically placed `@yield` directives
- in subpages, supply the yielded values with `@section` directive
- for bigger blocks use `@section` and `@endsection` to inject the content
- in subpages, first inherit a master's page layout using `@extends`
- extract large page elements into partials for easier managing
- stich the page elements back in with `@include` directive
- output escaped HTML: `{{ }}`
- output raw HTML: `{!! !!}` (danger)


In the `master.blade.php` page:

```jsx
// declare title as variable
<title>@yield('title')</title>

@yield('ad')

// place extracted navigation
@include('navbar')
```

In the `about.blade.php` page:

```jsx
@extends('master')

// supply the page title using shorthand @section syntax
@section('title', 'About us | Exemplary Website')

// supply section content using full @section syntax
@section('ad')
{{ "advertisement ublock-ed" }}
@endsection
```
