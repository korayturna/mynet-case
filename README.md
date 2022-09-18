# Readme
- Project based on Laravel v9.30.1 with built-in authentication
- LAMP environment required
- Laravel v9.30.1 requires PHP v8.0.2 or greater
- Composer required (stable v2.3.3)
- Apache Documentroot should be setup to 'public/' path
- composer.json includes ext-redis for able to install php-redis into Heroku server

# Installation

```bash
composer update --ignore-platform-req=ext-redis
```
Table migration;
```bash
php artisan migrate
```

# Usage

Project Link; http://fathomless-lowlands-51964.herokuapp.com/

Admin Link; http://fathomless-lowlands-51964.herokuapp.com/login

Username: korayturna@msn.com

Password: as12df34

Unit tests are done by PHPUnit;

```bash
./vendor/bin/phpunit
```
