# SNotepad Server

[![PHPUnit](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-phpunit.yml/badge.svg)](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-phpunit.yml)
[![PHPStan](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-phpstan.yml/badge.svg)](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-phpstan.yml)
[![Psalm](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-psalm.yml/badge.svg)](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-psalm.yml)
[![Coverage Status](https://coveralls.io/repos/github/codeigniter4/CodeIgniter4/badge.svg?branch=develop)](https://coveralls.io/github/codeigniter4/CodeIgniter4?branch=develop)
[![Downloads](https://poser.pugx.org/codeigniter4/framework/downloads)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub release (latest by date)](https://img.shields.io/github/v/release/codeigniter4/CodeIgniter4)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub stars](https://img.shields.io/github/stars/codeigniter4/CodeIgniter4)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub license](https://img.shields.io/github/license/codeigniter4/CodeIgniter4)](https://github.com/codeigniter4/CodeIgniter4/blob/develop/LICENSE)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/codeigniter4/CodeIgniter4/pulls)
<br>

## Update Logs:
v1.2 - New Features: 21-aug-2024 
- adding Order Jasa Management
- adding Payment Form + Functionality
- implementing New Dashboard for client



## What is SNotepad Server ?

As we already know, SNotepad is actually a secured layer of notepad used in desktop platform. 
For the public sharing purposes we used the SNotepad Server as mentioned in [official site](https://snpad.fgroupindonesia.com).

This repository holds the source code for SNotepad Server only.
For every implementation that would be rewritten to bring the quality and the code into a more modern version,
while still keeping as many of the things intact that has made people love the use of this app.

More information about the plans for this could be found in [SNotepad](https://snpad.fgroupindonesia.com), 
stated clearly in the main website. 

### Documentation

The [User Guide](https://snpad.fgroupindonesia.com/user_guide/) is the primary documentation for SNotepad Server.


## Contributing

We **are** accepting contributions from the community! It doesn't matter whether you can code, write documentation, or help find bugs,
all contributions are welcome.

Please read the [*Contributing to SNotepad*](https://snpad.fgroupindonesia.com/contribute_guide/).

SNPAD or SNotepad has a positive impact for people since its creation. This project would not be what it is without them.

Made with [contrib.rocks](https://contrib.rocks).

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> The end of life date for PHP 7.4 was November 28, 2022.
> The end of life date for PHP 8.0 was November 26, 2023.
> If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> The end of life date for PHP 8.1 will be November 25, 2024.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


(C) FGroupIndonesia team.