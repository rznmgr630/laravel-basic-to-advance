# LARAVEL 11

## 1. Introduction

-   Laravel is a MVC php framework for build full featured, large scale web application
-   It was developed by Taylor Otwell
-   MVC is a software design pattern commonly used for developing user interface that divides the related program logic into 3 interrelated elements.
-   `Model => It is responsible for managing the data rules and logic of the application`
-   `View => It is UI part`
-   `Controller => It is responsible for accepting inputs, validate it and converts it to commands for a model or view`

## 2. Advantage and Disadvantage of Laravel

### Advantage

-   Single Authentication
-   Mail services
-   Speed
-   Security

### Disadvantage

-   Updates might be problematic.
-   Composer package manager is goog to use but not as good as NPM.

## 3. Composer and XAMPP

### Composer

-   It is a tool that allows user to includes all the dependencies and libraries in our project.
-   It is a PHP package manager.
-   To install a package using composer `composer require millie/mollie-api-php`.

> **Note** In laravel all the dependencies are listed in composer.json file placed in the root of the project.

### Xampp

-   It is a free, open-source software that provides a simple and convenient way to set up the local web server.
-   X-cross-platform, A- apache a web server, M-Mysql, P-PHP, P-Perl

## 4. Artisan

-   It is a command line interface used in laravel.
-   It includes a set of commands which assists in building a web application.

> **Note** Make sure you have composer and PHP installed in your system before you install laravel.

## 5. Installation

-   Step 1: Install composer
-   Step 2: Go to directory where you want to install your new laravel project and type following command.

    ```js
    composer create-project laravel/laravel app_name

    ```

OR

```js
    1. composer global require laravel/installer
    2. laravel new app_name
```

> **Note** To serve the project in specific port `php artisan serve --port=4000`.

## 6. Famous Extension for the VS Code

1. laravel artisan: Ryan naddy creator
2. laravel blade snippets: winnielin creator
3. laravel blade spacer: Austen cameron creator
4. larave goto view: codingyu
5. laravel snippets: winnie lin
6. laravel extra intellisens: amir
7. live sass compiler: Ritwick day
8. php intellisense: felix becker
9. getter/setter generator: agustin martiniz
10. emmet live: yuri semen
11. vscode great icons: emmanuel

## 7. Difference between composer.json and composer.lock

-   composer.json describe all the packages (require or require-dev) installed as well as the information about the project.
-   composer.lock define the exact version installed in the project.

## 8. Other basic details

#### 1. Maintenance Mode

-   `php artisan down` => send 503 status code with a page having "be right back" text.
-   `php artisan up` => after updates is finished or maintenance is completed.

#### 2. .env file

-   It is a simple configuration file that is used to define some variables you want to pass to your application environment
-   Syntax `APP_NAME= rajanmidun` and to use it `env("APP_NAME")`

#### 3. vendor directory

-   It contains all the installed packages.
-   To view all the installed packages `composer show --tree`

## 9. Routing

#### 1. Introduction

-   Routing is a path for opening a website or it is a URL for opening a file.
-   In laravel all the request are mapped with the help of routes.

#### 2. Syntax

```js
// ***** Basic Routing *******
Route::get("/", function () {
    return view("welcome");
});
```

```js
// ***** Return a view *******
Route::view("/", "welcome");
```

```js
// ***** Post request *******
Route::post("/users", function(Request $request){
  echo print_r($request);
});
```

#### 3. Dynamic Route

-   If you can to pass a dynamic value in the route param you can use the below syntax.

```js
Route::post("/users/{id}", function ($id) {
    echo($id);
});
```

#### 4. Named Route

-   It is used to assign a unique name to a specify route.
-   It enhances readability,maintainability and flexibility especially when URls change.

```js
Route::post("/users/{id}", function ($id) {
    echo($id);
})->name('users.add');
```

#### 5. Grouping Routes

-   If the route path starts with the same prefix then we can use the concept of grouping.

```js
Route::prefix('users')->group(()=>{
    Route::get('/',[UserController::class,'getAll']);
    Route::post('/',[UserController::class,'addNew']);
    Route::put('/{id}',[UserController::class,'update']);
    Route::delete('/{id}',[UserController::class,'delete']);
  })
```

> **Note** So to call the route we need to add `/users` at the beginning of the route

#### 6. Route Model Binding

-   Laravel route model binding provides a convenient way to automatically inject the model instance directed into your route.

```js
Route::get("/users/{id}", function ($id) {}); // old method
Route::get("/users/{user}", function (User $user) { return $user}); // Route model binding
```

> **Note** In the above method it will only search by id but if you want to search by other field

```js
Route::get("/users/{user:firstName}", function (User $user) { return $user}); // It will search by firstName field
```

> **Note** If you don't wanna pass the value directly in the param then you can use below syntax

```js
// ********** Inside web .php **********
Route::get("/users/{user}", function (User $user) { return $user});

// ********** Inside your model **********
public function getRouteKeyName(){
  return 'firstName';
}
```

#### 7. Any and Match Route function

```js
  // This will match to any http requests method
  Route::any('/users',[UserController::class,'any']);


  // If you want to match the request method to a specific method
  Route::match(['get','post'],'/users',[UserController::class,'match']);
```

## 10. Controller

#### 1. Introduction

-   It is the central unit that handles the user requests,model and view.

#### 2. How to create a controller

```js
php artisan make:controller UserController
// here you can pass
// --resource to get all the required function inside controller at once
// --model=User to include the model in the controller
```

> **Note** The controller will be created in app\Http\Controllers directory

#### 3. How to use a controller

```js
use App\Http\Controllers\UserController;

Route::get('/users',[UserController::class,'getAll']);
```

#### 4. HTTP Response

```js
//  Response as a view
return view("users.index");

// Response as a  text
return "Hello World";

// Response as a json
return response()->json(["name"=>"John","age"=>30]);

// Response as an array
return ["name"=>"John","age"=>30];

// Response as a function/redirect
return redirect()->route("users.index");
return redirect('/');
```

## 11. View

#### 1. Introduction

-   It is the UI part of any application.

#### 2. How to create a view

```js
php artisan make:view about
```

> **Note** We can manually create a view without using above command

#### 3. Nested views

-   If we are creating a view inside any folder then we can called it as a nested views.
-   We can access nested views using the `return view('admin.login')`

#### 4. Passing data to view

-   Method 1: Using `with()` method for e.g. `return view('users.index')->with('name','John');`
-   Method 2: Using `compact()` method for e.g. `return view('users.index',compact('users'))`
-   Method 3: Using `view('view_name',array)` for e.g. `return view('welcome',['name'=>'Rajan'])`

#### 5. Check if the view exists or not before returning

-   Method 1: Using `view()->exists('view_name')` for e.g. `if(view()->exists('welcome')`
-   Method 2: Using View facade for e.g. `if(View::exists('welcome'))`

#### 6. Blade Templating Engine

-   Blade is the default templating engine for Laravel.
-   It is used to create dynamic and reusable views.
-   Supports template inheritance and sections for creating maintainable layouts.
-   Allows embedding PHP code directly within templates using Blade syntax.
-   Simplifies rendering dynamic data within views.
-   Provides features like conditional rendering, loops, and component rendering.
-   Facilitates the creation of reusable UI components.
-   Offers built-in directives `(e.g., @if, @foreach, @include, @extends)` for writing cleaner and more expressive templates.

#### 7. Subview

-   A subview in Blade allows you to include one view inside another, enabling code modularity, reusability, and better organization of your templates.
-   To use a subview, you need to create a new view file and then include it in your main view using the `@include` directive.
-   To pass data to a subview, you can use the `@include` directive with the `data` attribute , like `@include('subview', ['name' => 'John'])`.
-   @includeIf('subview') // This will include the subview only if the subview exists.

#### 8. component

-   Components in Laravel are reusable UI building blocks that encapsulate HTML, CSS, and Blade logic, making it easier to create consistent and maintainable templates.

```js
  // Step 1
  php artisan make:component Alert

  // Step 2
  // In Alert.php file
  namespace App\View\Components;

  use Illuminate\View\Component;

  class Alert extends Component
  {
      public $type;

      public function __construct($type = 'info')
      {
          $this->type = $type;
      }

      public function render()
      {
          return view('components.alert');
      }
  }

  // Step 3
  // In resources/views/components/alert.blade.php file
  <div class="alert alert-{{ $type }}">
  {{ $slot }}
  </div>

  // Step 4
  // In your view
  <x-alert type="success">Hello</x-alert>
```

## 12. Form Validation

-   Whenever we take user input, we should validate it to ensure it meets our requirements.
-   Laravel provides a robust validation system that allows you to validate user input and display error messages.

```js
  // Basic validation
  $request->validate([
    'name' => 'required', // The name field is required
    'email' => 'required|email', // The email field is required and must be a valid email address
   ]);

  //  Customize the default validation message
  $request->validate([
    'name' => [
      'required' => 'Please enter your name',
    ],
    'email' => [
      'required' => 'Please enter your email',
      'email' => 'Please enter a valid email address',
    ],
  ]);

  OR
  $request->validate([
     'name' => 'required',
    'email' => 'required|email',
  ],[
    'name.required' => 'Please enter your name',
    'email.required' => 'Please enter your email',
    'email.email' => 'Please enter a valid email address',
  ])
```

> **Note** If any validation fails then it will redirect back to the previous page with the validation errors. In case of sending a checkbox we need to specify the name field with an array like `name="language[]"` and in
> the validation we need to specify the validation rule as `language.*` to validate each item in the array.

#### 1. Preserving the old value

-   When a form is submitted, the old value of the field is not preserved.
-   To preserve the old value, we can use the `old()` helper function.

```js
 // Preserving the old value
 <input type="text" name="name" value="{{ old('name') }}">
```

#### 2. Displaying the validation errors

-   To display the validation errors, we can use the `withErrors()` method.
-   This method will display the validation errors in the view.
-   We can also use the `withInput()` method to preserve the old input values.
-   We can use the `withErrors()` and `withInput()` methods together to display the validation errors and preserve the old input values.
-   We can also use the `validate()` method to validate the request data and display the validation errors.

```js
// Get all error at once inside the view
  @if($errors->any())
    @foreach($errors->all() as $error)
      <div style="color:red;">{{$error}} </div>
    @endforeach
  @endif


  // To display the error after corresponding input field
  @if($errors->has('name')) OR @if($errors->first('name'))
      <div style="color:red;">{{$errors->first('name')}} </div>
  @endif

  // ===============OR=================
  <div style="color:red;">
    @error('name')
      {{$message}}
    @enderror
  </div>
```

#### 3. Publishing the validation message

-   syntax `php artisan lang:publish`
-   This command will publish the default validation messages in the language file.

#### 4. Custom Validation rule

-   We can create a custom validation rule by creating a class that implements the `Validator` interface.
-   We can then use this custom validation rule in our validation rules.

```js
  // Step 1: Create a new class that implements the Validator interface
  php artisan make:rule Uppercase

  // Step 2: Define the validation logic in the class
  namespace App\Rules;
  use Illuminate\Contracts\Validation\ValidationRule;
  class Age implements ValidationRule
  {
    public function validate($attribute, $value,$fail) {
      if($value!==strtoupper($value)){
        $fail('The :attribute must be in uppercase.');
      }
    }
  }

  // Step 3 inside the controller
  $request->validate([
    'name' => 'required|uppercase', // The name field is required and must be uppercase
    'email' => 'required|email',
   ]);
```

## 13. URL Generation

-   In laravel to work with url we have `URL` facade and `url()` helper function

```js
// Basic syntax
$url = URL::to("home");
$url = url("home");

URL::current(); // to get current path
URL::full(); // to get current path along with query param

URL::previous(); // To get the previous path

URl::to("about", ["rajan"]); // to generate url with route param rajan

URL::to('search', ['q' => 'Laravel']); // to generate url with query param q=laravel
```

## 14. Middlware

-   It is the piece of code that runs in betweeen any request and response cycle.
-   It can be used to perform any task like authentication, rate limiting, logging etc.
-   We can use middleware in routes, controllers or even in the middleware class itself.

#### 1. How to create a middleware

```js
 php artisan make:middleware AuthMiddleware

//  Inside the middleware you can check whether the user is authenticated or not
```

#### 2. Registering middleware [Global and Group Middleware]

-   Go to `bootstrap\app.php` file and inside the ->withMiddleware() function

```js
    ->withMiddleware(function(Middleware $middleware){
      // This is global middleware
      $middleware->append(AuthMiddleware::class);

      // This is group middleware
      $middleware->appendToGroup('check1',[
        AgeCheck::class,
        CountryCheck::class
      ]);
    })


    // To use the group middleware in the web.php
    Route::group(['middleware' => 'check1'], function () { }
    Route::middleware('check1')->group(function(){
       // Register your routes here
    })

    OR
    Route::get('/home',[UserController::class,'getHome'])->middleware('check1');
```

#### 2. Assigning middleware to Routes

-   We can assign middleware to routes using the `middleware()` function.

```js
    Route::get('/dashboard',[DashboardController:class,'index'])->middleware(AuthMiddleware::class);
```

## 15. DB

-   Laravel uses Eloquent ORM to interact with the database.
-   Eloquent ORM is an Object Relational Mapping system that allows us to interact with the database using PHP objects.

#### 1. Basic example

```js
// inside the usercontroller
use Illuminate\Supports\Facades\DB;

function getUsers() {
    return DB::select("select * from users");
}
```

#### 2. Query Builder

-   Query Builder is a fluent interface to create and execute database queries.
-   It is used to build and execute SQL queries.

```js
  // inside the usercontroller
  use Illuminate\Supports\Facades\DB;

  function getUsers() {
      // $result=DB::table('users')->get();
      $result=DB::table('users')->where('phone','12345')->get();
      return view('user',compact(['result']))
  }
```

## 16. Model

-   In Laravel, a model is a class that represents a database table.
-   It is responsible for managing the data rules and logic of the application.
-   It takes the user input from the controller.
-   We can use the `make:model` command to create a new model.

#### 1. How to create a Model

```js
  php artisan make:model User
```

> **Note** When we create a model, laravel basically tries to point to the table with the same name of the model. So if we create a model called `User`,
> it will try to point to the `users` table. If you want to point the model to a different table, you can specify the table name in the model.
> For example: `protected $table = 'users_table';`

#### 2. How to use model inside a controller

```js
  // inside your controller
 use App\Models\User;

  function getAllUsers(){
    $users = User::all();
    return $users;
  }

```

#### 2. Inspecting model

-   In order to view the detail of the model we can use this command `php artisan model:show User`

## 17. HTTP Client

-   Laravel provides a simple way to make HTTP requests using the `Http` facade.
-   We can use the `get`, `post`, `put`, `patch`, `delete` methods to make HTTP requests.

```js
  function getJsonData(){
    $response = Http::get('https://jsonplaceholder.typicode.com/posts');
    $data=$response->body();
    return $response->json($response);
  }
```

## 18. HTTP Request Class

-   Laravel provides a simple way to access the user's HTTP request using the `Request` facade.
-   We can use the `input`, `method`, `header`, `cookie`, `ip`, `userAgent`, `url`, `secure`, `isSecure`, `isLocal`, `isAjax`, `isMethod`, `isPost`, `isGet`, `isPut`, `isPatch`, `isDelete` methods to access the HTTP request.

```js
  function store(Request $request){
     echo $request->input('name');
     echo $request->method();
     echo $request->header('Accept');
     echo $request->cookie('token');
     echo $request->ip();
     echo $request->userAgent();
     echo $request->url();
  }

```
