# asanzred/kount

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require asanzred/kount
```

Add ServiceProvider in your `app.php` config file.

```php
// config/app.php
'providers' => [
    ...
    Asanzred\Kount\KountServiceProvider::class,
]
```

## Configuration

Publish config and migration by running:

``` bash
    php artisan vendor:publish --provider=asanzred/kount
```
``` bash
    php artisan migrate
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email asanzred@gmail.com instead of using the issue tracker.

## Credits

- [Alberto Sanz Redondo][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/asanzred/kount.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/asanzred/kount.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/asanzred/kount
[link-downloads]: https://packagist.org/packages/asanzred/kount
[link-author]: https://github.com/asanzred
[link-contributors]: ../../contributors
