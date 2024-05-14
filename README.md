![](https://banners.beyondco.de/Laravel%20Global%20Search.png?theme=light&packageManager=composer+require&packageName=dipesh79%2Flaravel-global-search&pattern=architect&style=style_1&description=Laravel+Global+Search+is+a+flexible+and+customizable+Laravel+package+that+enables+developers+to+perform+global+searches+across+multiple+models+with+ease.&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

# Laravel Global Search

Sure! Here's a short and sweet description for the project:

"**Laravel Global Search** is a flexible and customizable Laravel package that enables developers to perform global searches across multiple models with ease. With support for custom and default models, configurable search behavior, and robust error handling, it empowers developers to create powerful search functionality tailored to their application's needs. Whether searching for specific records or retrieving all data, Laravel Global Search provides a seamless experience for users and developers alike."

## Installation

You can install the package via composer:

```bash
composer require dipesh79/laravel-global-search
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Dipesh79\LaravelGlobalSearch\LaravelGlobalSearchServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
<?php

return [
    /**
     * Default Models to be searched
     */

    'models' => [
        // \App\Models\User::class,
        // \App\Models\Post::class,
    ],

    /**
     * Default search operator
     */

    'searchOperator' => 'like',

    /**
     * Allow empty query search
     *
     * If set to false, it will return an empty collection if the query is empty
     *
     */

    'allowEmptyQuerySearch' => true,
];

```

## Usage

You can use the `Searchable` trait in your models to enable global search on them.

```php
use Dipesh79\LaravelGlobalSearch\Traits\Searchable;

class User extends Model
{
    use Searchable;
}
```

Specify the columns to be searched on the model.

```php
use Dipesh79\LaravelGlobalSearch\Traits\Searchable;

class User extends Model
{
    use Searchable;

    protected array $searchable = ['name', 'email'];
}
```
Now, you can search across this model using the `searchGlobally` method.

```php
use App\Models\User;

$users = User::searchGlobally('John Doe');

```

You can also search across multiple models by specifying the models in the config file.

```php
return [
    /**
     * Default Models to be searched
     */

    'models' => [
        \App\Models\User::class,
        \App\Models\Post::class,
    ],
];
```

Now, you can search across multiple models using the `searchGlobally` method.

```php
use Dipesh79\LaravelGlobalSearch\LaravelGlobalSearch;

$results = LaravelGlobalSearch::searchGlobally('John Doe');

```

Here you will receive a collection of results from both `User` and `Post` models.

### Optional Parameters

You can also pass optional parameters to the `searchGlobally` method.

```php
use Dipesh79\LaravelGlobalSearch\LaravelGlobalSearch;

$models = [
    \App\Models\User::class,
    \App\Models\Post::class,
];

$results = LaravelGlobalSearch::searchGlobally('John Doe', $models,'like');

```

You can pass the models to be searched, the search operator, and the columns to be searched in the parameter.

You can pass the models to be searched, the search operator in `LaravelGlobalSearch::searchGlobally` method.

```php

$models = [
    \App\Models\User::class,
    \App\Models\Post::class,
];

$results = LaravelGlobalSearch::searchGlobally('John Doe', $models, 'like']);

```

## Best Practices

- **Custom Models**: Define custom models in the config file to search across specific models.
- **Searchable Trait**: Use the `Searchable` trait in your models to enable global search on them.
- **Searchable Columns**: Specify the columns to be searched on the model using the `$searchable` property.
- **Search Operator**: Define the search operator in the config file or pass it as an parameter to the `searchGlobally` method.
- **Error Handling**: Handle errors gracefully by checking for empty results or handling exceptions.

## Contributing

Thank you for considering contributing to the Laravel Global Search package! Please feel free to submit issues, create pull requests, or provide feedback to help improve the package for the Laravel community.

## License

The Laravel Global Search package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Credits

- [Dipesh79](https://khanaldipesh.com.np)
- [All Contributors](../../contributors)
- [Laravel Banner](https://banners.beyondco.de/)

## Author

- [@Dipesh79](https://www.github.com/Dipesh79)


## Support

For support, email [dipeshkhanal79[at]gmail[dot]com](mailto::dipeshkhanal79@gmail.com).
