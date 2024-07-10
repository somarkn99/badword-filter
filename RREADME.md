
# Bad Word Filter

## Installation

1. Install the package via Composer:
    ```bash
    composer require your-namespace/bad-word-filter
    ```

2. Publish the configuration file:
    ```bash
    php artisan vendor:publish --provider="BadWordFilter\BadWordFilterServiceProvider"
    ```

3. Customize the list of bad words in `config/badwordfilter.php`.

4. Apply the middleware to your routes or controllers:
    ```php
    Route::middleware(['badwordfilter'])->group(function () {
        Route::post('/your-protected-route', [YourController::class, 'yourMethod']);
    });
    ```

## Usage

After publishing the configuration file, you can customize the list of bad words by editing the `config/badwordfilter.php` file. Add or remove words from the `bad_words` array as needed.

The middleware will check all incoming requests for these bad words and respond with a 400 status code if any are found.

## Example Configuration

```php
return [
    'bad_words' => [
        'badword1', 'badword2', // Add your default list of bad words here
    ],
];
```

## License

This package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).