# Helpers

https://laravel.com/docs/master/helpers

Laravel includes a variety of global helper PHP functions.


## Arrays and Objects (27)

https://laravel.com/docs/master/helpers#arrays

- data_fill     Sets missing value within nested array/object using dot notation
- data_get      Gets a value from a nested array/object using dot notation
- data_set      Sets a value in a nested array/object using dot notation

- head          Returns the first element of an array
- last          Returns the last element of an array

- `Arr::add`       Adds KV pair if KEY doesn't exist or is null
- `Arr::collapse`  Collapses an array of arrays into a single array
- `Arr::divide`
- Arr::dot
- Arr::except
- Arr::first
- Arr::flatten
- Arr::forget
- Arr::get
- Arr::has
- Arr::isAssoc
- Arr::last
- Arr::only
- Arr::pluck
- Arr::prepend
- Arr::pull
- Arr::random
- Arr::set
- Arr::sort
- Arr::sortRecursive
- Arr::where
- Arr::wrap


## Paths (8)

- base_path       Fully-qualified path to the project root directory
- app_path        Fully-qualified path to the `app` directory
- config_path     Fully-qualified path to the `config` directory
- database_path   Fully-qualified path to the `database` directory
- public_path     Fully-qualified path to the `public` directory
- resource_path   Fully-qualified path to the `resources` directory
- storage_path    Fully-qualified path to the `storage` directory.
- mix             Path to a versioned (with appended hash) file (css, js)


## Strings (33)

https://laravel.com/docs/master/helpers#strings

- `__`                Translates translation string or translation key
- trans               Translates the given translation key using localization
- trans_choice        Translates the given translation key with inflection

- `e`                 Runs htmlspecialchars with double_encode option set to true
- class_basename
- preg_replace_array  Replaces a pattern in string sequentially using array

- Str::studly         Converts a string to *StudlyCase*
- Str::camel          Converts a string to *camelCase*
- Str::kebab          Converts a string to *kebab-case*
- Str::snake          Converts a string to *snake_case*
- Str::title          Converts a string to *Title Case*
- Str::slug           Converts a string to an URL-friendly form
- Str::singular       Converts a string (noun) to singular
- Str::plural         Converts a string (noun) to plural

- Str::after          String remainder after the first occurrence of a value
- Str::afterLast      String remainder after the last occurrence of a value
- Str::before         String portion before the first occurrence of a value
- Str::beforeLast     String portion before the last occurrence of a value

- Str::contains       Check
- Str::containsAll    Check

- Str::startsWith     Check if a string begins with a given value
- Str::start          Prepends a value if a string doesn't already start with it
- Str::endsWith       Check if a string ends with a given value
- Str::finish         Appends a value if a string doesn't already end with it

- Str::is             Check string against the pattern
- Str::limit          Truncates the given string at the specified length
- Str::orderedUuid    Generates a "timestamp first" UUID 
- Str::random         Generates a random string of the specified length
- Str::replaceArray   replaces a given value in the string sequentially using an array
- Str::replaceFirst   replaces the first occurrence of a given value in a string
- Str::replaceLast    replaces the last occurrence of a given value in a string
- Str::uuid           Generates a UUID v.4
- Str::words          Keeps nr. of words in string then adds char(s) as ellipses


## URLs

- route


## Miscellaneous

- auth
- app


