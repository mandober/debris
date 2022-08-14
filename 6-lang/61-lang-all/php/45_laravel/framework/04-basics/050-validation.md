# Validation

https://laravel.com/docs/master/validation

<!-- TOC -->

- [Validation Example](#validation-example)
  - [Defining The Routes](#defining-the-routes)
  - [Creating The Controller](#creating-the-controller)
  - [Writing The Validation Logic](#writing-the-validation-logic)
    - [Stopping On First Validation Failure](#stopping-on-first-validation-failure)
    - [A Note On Nested Attributes](#a-note-on-nested-attributes)
  - [Displaying The Validation Errors](#displaying-the-validation-errors)
    - [The @error Directive](#the-error-directive)
  - [A Note On Optional Fields](#a-note-on-optional-fields)
    - [AJAX Requests & Validation](#ajax-requests--validation)
- [Form Request Validation](#form-request-validation)
  - [Creating Form Requests](#creating-form-requests)
    - [Adding After Hooks To Form Requests](#adding-after-hooks-to-form-requests)
  - [Authorizing Form Requests](#authorizing-form-requests)
  - [Customizing The Error Messages](#customizing-the-error-messages)
  - [Customizing The Validation Attributes](#customizing-the-validation-attributes)

<!-- /TOC -->


Introduction
  Validation Quickstart
  Defining The Routes
  Creating The Controller
  Writing The Validation Logic
  Displaying The Validation Errors
  A Note On Optional Fields
Form Request Validation
  Creating Form Requests
  Authorizing Form Requests
  Customizing The Error Messages
  Customizing The Validation Attributes
Manually Creating Validators
  Automatic Redirection
  Named Error Bags
  After Validation Hook
Working With Error Messages
  Custom Error Messages
Available Validation Rules
Conditionally Adding Rules
Validating Arrays
Custom Validation Rules
  Using Rule Objects
  Using Closures
  Using Extensions
  Implicit Extensions


## Validation

By default, Laravel's base controller class uses a `ValidatesRequests` trait which provides methods to validate incoming HTTP request with a variety of powerful validation rules.

Example of validating a form and displaying the error messages back to the user:

First, let's assume we have the following routes defined:

```php
Route::get('post/create', 'PostController@create');
Route::post('post', 'PostController@store');
```

Next, let's take a look at a simple controller that handles these routes. We'll leave the `store()` empty for now:

```php
class PostController extends Controller
{
    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        // Validate and store the blog post...
    }
}
```

## Validation Logic
To validate the new blog post, we'll use `validate()` provided by the `Illuminate\Http\Request` object. If the validation rules pass, the code keeps executing; else an exception is thrown and the proper error response is automatically generated: redirect response for traditional HTTP request (e.g. 404) and JSON response for AJAX requests.

Rules are validated in the order they are assigned.

```php
$validatedData = $request->validate([
    // validation rules as the specially formatted string:
    'title' => 'required|unique:posts|max:255',
    'body'  => 'required'
    
    // or, validation rules as arrays of rules:
    'title' => ['required', 'unique:posts', 'max:255'],
    'body'  => ['required']
    
    // use bail on attr to stop on the first validation failure:
    'title' => 'bail|required|unique:posts|max:255',
    'body'  => 'required',
    
    // use dot syntax for nested params:
    'author.name' => 'required',
    'author.description' => 'required',

]);
```
So, if the "required" rule on the title attribute fails, the unique rule will not be checked, as it stops on the first failure.


## Displaying Validation Errors
If validation fails, Laravel redirects user to their previous location flashing the validation errors. We don't have to explicitly bind the error messages to the view in our GET route cuz Laravel will check for errors in the session data, and if any, automatically bind them to the view.

The `$errors` var is an instance of `Illuminate\Support\MessageBag`.

The `$errors` var is bound to the view by the `Illuminate\View\Middleware\ShareErrorsFromSession` middleware, which is provided by the web middleware group.

When this middleware is applied, an `$errors` variable will always be available in the views, allowing you to assume the `$errors` variable is (always) defined.

In the example, the user is redirected to controller's `create` when validation fails, and we flash the error messages:

```php
<!-- /resources/views/post/create.blade.php -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

## Directive: @error
Use `@error` to quickly check for validation errors for a given attribute. Within `@error` directive, echo `$message` to display the error message:

```php
<!-- /resources/views/post/create.blade.php -->
<input id="title" type="text" class="@error('title') is-invalid @enderror">
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
```

## Optional Fields
By default, Laravel includes the `TrimStrings` and `ConvertEmptyStringsToNull` middleware in the global middleware stack. These middleware are listed in the stack by the `App\Http\Kernel` class. Because of this, you will often need to mark your "optional" request fields as *nullable* to let the validator know the values that are null are not invalid.

```php
$request->validate([
    'title'      => 'required|unique:posts|max:255',
    'body'       => 'required',
    'publish_at' => 'nullable|date',
]);
```

`publish_at` may be null or a valid date. If not for the nullable modifier, the validator would consider null an invalid date.

## AJAX Requests and Validation
When using `validate` in an AJAX request, Laravel will not generate a redirect response, but a JSON response instead, that contains validation errors. This JSON response is sent with a 422 HTTP status code.

## Form Request Validation
**Form requests** are custom request classes that contain validation logic, employed in complex validation scenarios.

The generated Form Request is placed in app/Http/Requests:
  `php artisan make:request StoreBlogPost`

Type-hint any dependencies you need (in rules method's signature) and they will be auto resolved (via the Laravel service container).

```php
public function rules() {
    return [
        'title' => 'required|unique:posts|max:255',
        'body'  => 'required',
    ];
}
```
Evaluation of validation rules: just type-hint the Request on your controller method and the incoming Form Request is validated before the controller method is called (so you don't need to clutter your controller with validation logic).

```php
public function store(StoreBlogPost $request) {
    // The incoming request is valid
    
    // Retrieve validated input data
    $validated = $request->validated();
}
```

## After Hooks To Form Requests

To add an *after hook* to a Form Request, use `withValidator`. This method receives the fully constructed validator, allowing you to call any of its methods before the validation rules are actually evaluated:

```php
// Configure validator instance:
public function withValidator($validator) {
  $validator->after(function ($validator) {
    if ($this->somethingElseIsInvalid()) {
      $validator->errors()->add('field', 'Something wrong with field!');
    }
  });
}
```

## Authorizing Form Requests

The Form Request class also contains an `authorize()`. Within this method, you may check if the authenticated user actually has the authority to update a given resource.

For example, determine if a user owns a blog comment they want to update:

```php
// Determine if the user is authorized to make this request
public function authorize() {
    $comment = Comment::find($this->route('comment'));
    return $comment && $this->user()->can('update', $comment);
}
```

Since all Form Requests extend the base Laravel request class, we may use the `user` method to access the currently authenticated user. The `route` method has access to the URI params defined on the route, e.g. `{comment}`.

```php
Route::post('comment/{comment}');
```
If `authorize` fails, a HTTP response with a 403 status code is returned and the controller method (`update` here) is not executed. So if you plan to have authorization logic in another part of your app, return `true` from `authorize`.

```php
// Determine if the user is authorized to make this request
public function authorize() {
    return true;
}
```

## Custom Error Messages

Override `messages` method and make it return an array of attr-rule pairs with corresponding messages:

```php
// Get custom error messages for these validation rules:
public function messages() {
    return [
        'title.required' => 'A title is required',
        'body.required'  => 'A message is required',
    ];
}
```

## Custom Validation Attributes

To replace `:attribute` portion of validation message with a custom attribute name, specify the custom names by overriding the `attributes` method. Make it return an array of attribute-name pairs:

```php
// custom attributes for validator errors
public function attributes() {
    return [
        'email' => 'email address',
    ];
}
```

## Manually Creating Validators

If you do not want to use the validate method on the request, you may create a validator instance manually using the Validator facade. The make method on the facade generates a new validator instance:

```php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Store the blog post...
    }
}
```

The first argument passed to the make method is the data under validation. The second argument is the validation rules that should be applied to the data.

After checking if the request validation failed, you may use the withErrors method to flash the error messages to the session. When using this method, the $errors variable will automatically be shared with your views after redirection, allowing you to easily display them back to the user. The withErrors method accepts a validator, a MessageBag, or a PHP array.


## Automatic Redirection

If you would like to create a validator instance manually but still take advantage of the automatic redirection offered by the request's validate method, you may call the validate method on an existing validator instance. If validation fails, the user will automatically be redirected or, in the case of an AJAX request, a JSON response will be returned:

```php
Validator::make($request->all(), [
    'title' => 'required|unique:posts|max:255',
    'body' => 'required',
])->validate();
```

## Named Error Bags
If you have multiple forms on a single page, you may wish to name the MessageBag of errors, allowing you to retrieve the error messages for a specific form. Pass a name as the second argument to withErrors:

```php
return redirect('register')
            ->withErrors($validator, 'login');
```

You may then access the named MessageBag instance from the $errors variable:

```php
{{ $errors->login->first('email') }}
```

## After Validation Hook
The validator also allows you to attach callbacks to be run after validation is completed. This allows you to easily perform further validation and even add more error messages to the message collection. To get started, use the after method on a validator instance:
```php
$validator = Validator::make(...);

$validator->after(function ($validator) {
    if ($this->somethingElseIsInvalid()) {
        $validator->errors()->add('field', 'Something is wrong with this field!');
    }
});

if ($validator->fails()) {
    //
}
```

## Working With Error Messages
After calling the errors method on a Validator instance, you will receive an Illuminate\Support\MessageBag instance, which has a variety of convenient methods for working with error messages. The $errors variable that is automatically made available to all views is also an instance of the MessageBag class.

Retrieving The First Error Message For A Field
To retrieve the first error message for a given field, use the first method:

```php
$errors = $validator->errors();

echo $errors->first('email');
```

## Retrieving All Error Messages For A Field
If you need to retrieve an array of all the messages for a given field, use the get method:

```php
foreach ($errors->get('email') as $message) {
    //
}
```

If you are validating an array form field, you may retrieve all of the messages for each of the array elements using the * character:
```php
foreach ($errors->get('attachments.*') as $message) {
    //
}
```

## Retrieving All Error Messages For All Fields
To retrieve an array of all messages for all fields, use the all method:
```php
foreach ($errors->all() as $message) {
    //
}
```

## Determining If Messages Exist For A Field
The has method may be used to determine if any error messages exist for a given field:
```php
if ($errors->has('email')) {
    //
}
```

## Custom Error Messages
If needed, you may use custom error messages for validation instead of the defaults. There are several ways to specify custom messages. First, you may pass the custom messages as the third argument to the Validator::make method:
```php
$messages = [
    'required' => 'The :attribute field is required.',
];

$validator = Validator::make($input, $rules, $messages);
```

In this example, the :attribute placeholder will be replaced by the actual name of the field under validation. You may also utilize other placeholders in validation messages. For example:
```php
$messages = [
    'same'    => 'The :attribute and :other must match.',
    'size'    => 'The :attribute must be exactly :size.',
    'between' => 'The :attribute value :input is not between :min - :max.',
    'in'      => 'The :attribute must be one of the following types: :values',
];
```

## Specifying A Custom Message For A Given Attribute
Sometimes you may wish to specify a custom error message only for a specific field. You may do so using "dot" notation. Specify the attribute's name first, followed by the rule:
```php
$messages = [
    'email.required' => 'We need to know your e-mail address!',
];
```

## Specifying Custom Messages In Language Files
In most cases, you will probably specify your custom messages in a language file instead of passing them directly to the Validator. To do so, add your messages to custom array in the resources/lang/xx/validation.php language file.
```php
'custom' => [
    'email' => [
        'required' => 'We need to know your e-mail address!',
    ],
],
```

## Specifying Custom Attributes In Language Files
If you would like the :attribute portion of your validation message to be replaced with a custom attribute name, you may specify the custom name in the attributes array of your resources/lang/xx/validation.php language file:
```php
'attributes' => [
    'email' => 'email address',
],
```


## Specifying Custom Values In Language Files
Sometimes you may need the :value portion of your validation message to be replaced with a custom representation of the value. For example, consider the following rule that specifies that a credit card number is required if the payment_type has a value of cc:

```php
$request->validate([
    'credit_card_number' => 'required_if:payment_type,cc'
]);
```

If this validation rule fails, it will produce the following error message:

The credit card number field is required when payment type is cc.
Instead of displaying cc as the payment type value, you may specify a custom value representation in your validation language file by defining a values array:
```php
'values' => [
    'payment_type' => [
        'cc' => 'credit card'
    ],
],
```

Now if the validation rule fails it will produce the following message: "The credit card number field is required when payment type is credit card".












