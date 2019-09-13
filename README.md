# EA Wp Menu

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)
[![Contributor Covenant][ico-code-of-conduct]](CODE_OF_CONDUCT.md)

_Custom preset for Laravel frontend scaffolding._

## Requirements

- [Laravel](https://laravel.com)
- [NPM](https://npmjs.com)

## Install Package

Require this package with composer in development environment via command:

```bash
composer require yoelpc4/ea-wp-menu --dev
```

## Install Suggestion Dependencies

This package need `laravelcollective/html` package to build form input. Install it via command:

```bash
composer require laravelcollective/html v5.8.1
```

This package need `realrashid/sweet-alert` package to build alert. Install it via command:

```bash
composer require realrashid/sweet-alert
```

This package need `yajra/laravel-datatables-oracle` package to build datatables. Install it via command:

```bash
composer require yajra/laravel-datatables-oracle
```

This package need `yajra/laravel-datatables-buttons` package to build datatables button. Install it via command:

```bash
composer require yajra/laravel-datatables-buttons
```

This package need `yoelpc4/laravel-attachment` package to build attachment manager. Install it via command:

```bash
composer require yoelpc4/laravel-attachment v1.0.0
```

## Install Scaffolding

Make a symlink from storage directory to public directory via command:

```bash
php artisan storage:link
```

Create laravel authentication scaffolding via command:

```bash
php artisan make:auth
```

Use the custom preset to install scaffolding with the following command:

```bash
php artisan preset ea-wp-menu
```

Compile the scaffolding via command:

```bash
npm install && npm run dev
```

## NPM devDependencies Verification

To avoid incompatibility issue in the future, verify specific NPM devDependencies packages version according to the list below:

- @fortawesome/fontawesome-free `v5.10.1`
- bootstrap `v4.0.0`
- jquery `v3.2`
- perfect-scrollbar `v0.8.1`

## License

The EA Wp Menu Preset is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

[ico-version]: https://img.shields.io/packagist/v/yoelpc4/ea-wp-menu.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/yoelpc4/ea-wp-menu.svg?style=flat-square
[ico-license]: https://img.shields.io/packagist/l/yoelpc4/ea-wp-menu.svg?style=flat-square
[ico-code-of-conduct]: https://img.shields.io/badge/Contributor%20Covenant-v1.4%20adopted-ff69b4.svg
[link-packagist]: https://packagist.org/packages/yoelpc4/ea-wp-menu
[link-downloads]: https://packagist.org/packages/yoelpc4/ea-wp-menu
