# Laravel DataTables Scout Plugin

[![Laravel 5.4|5.5](https://img.shields.io/badge/Laravel-5.4|5.5-orange.svg)](http://laravel.com)
[![Latest Stable Version](https://img.shields.io/packagist/v/yajra/laravel-datatables-scout.svg)](https://packagist.org/packages/yajra/laravel-datatables-scout)
[![Build Status](https://travis-ci.org/yajra/laravel-datatables-scout.svg?branch=master)](https://travis-ci.org/yajra/laravel-datatables-scout)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yajra/laravel-datatables-scout/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yajra/laravel-datatables-scout/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/yajra/laravel-datatables-scout.svg)](https://packagist.org/packages/yajra/laravel-datatables-scout)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/yajra/laravel-datatables-scout)

This package is a plugin of [Laravel DataTables](https://github.com/yajra/laravel-datatables) for handling server-side function of exporting the table as csv, excel, pdf and printing.

## Requirements
- [PHP >=7.0](http://php.net/)
- [Laravel 5.4|5.5](https://github.com/laravel/framework)
- [jQuery DataTables v1.10.x](http://datatables.net/)

## Documentations
- [Laravel DataTables Documentation](http://yajrabox.com/docs/laravel-datatables)

## Installation
`composer require yajra/laravel-datatables-scout:^1.0`

## Usage

```php
use Yajra\DataTables\ScoutDataTable;

$model = new App\User;

return (new ScoutDataTable($model))->toJson()
```

## Contributing

Please see [CONTRIBUTING](https://github.com/yajra/laravel-datatables-scout/blob/master/.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [aqangeles@gmail.com](mailto:aqangeles@gmail.com) instead of using the issue tracker.

## Credits

- [Arjay Angeles](https://github.com/yajra)
- [All Contributors](https://github.com/yajra/laravel-datatables-scout/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/yajra/laravel-datatables-scout/blob/master/LICENSE.md) for more information.

## Buy me a beer
<a href='https://pledgie.com/campaigns/29515'><img alt='Click here to lend your support to: Laravel DataTables and make a donation at pledgie.com !' src='https://pledgie.com/campaigns/29515.png?skin_name=chrome' border='0' ></a>
