# LARAVEL 11

## 1. Introduction

-   Laravel is a MVC php framework for build full featured, large scale web application
-   It was developed by Taylor Otwell
-   MVC is a software design pattern commonly used for developing user interface that divides the related program logic into 3 interrealted elements.
-   `Model => It is responsible for managine the data rules and logic of the application`
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

## 3. Composer and Xampp

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
