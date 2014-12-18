# Phprest Orm Service

[![Author](http://img.shields.io/badge/author-@adammbalogh-blue.svg?style=flat-square)](https://twitter.com/adammbalogh)
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)

# Description

Orm Service which uses these components:
* [Doctrine\Orm](https://github.com/doctrine/doctrine2)
* [Doctrine\Migrations](https://github.com/doctrine/migrations)
* [Doctrine\Data-Fixtures](https://github.com/doctrine/data-fixtures)

# Installation

Install it through composer.

```json
{
    "require": {
        "phprest/phprest-service-orm": "@stable"
    }
}
```

**tip:** you should browse the [`phprest/phprest-service-orm`](https://packagist.org/packages/phprest/phprest-service-orm)
page to choose a stable version to use, avoid the `@stable` meta constraint.

# Usage

## Configuration

For the configuration you should check the [Config](src/Config.php) class.

### Example

```php
<?php
$ormConfig = new \Phprest\Service\Orm\Config(
    [
        'driver'            => 'pdo_mysql',
        'host'              => 'localhost',
        'dbname'            => 'phprest',
        'charset'           => 'utf8',
        'user'              => 'root',
        'password'          => 'root'
    ],
    ['path_to_the_entities']
);

$ormConfig->migration = new \Phprest\Service\Orm\Config\Migration('path_to_the_migrations');
$ormConfig->fixture = new \Phprest\Service\Orm\Config\Fixture('path_to_the_fixtures');
```

## Registration

```php
<?php
use Phprest\Service\Orm;
# ...
/** @var \Phprest\Application $app */

$app->registerService(new Orm\Service(), $ormConfig);
# ...
```

## Reaching from a Controller

To reach your Service from a Controller you should use the Service's [Getter](src/Getter.php) Trait.

```php
<?php namespace App\Module\Controller;

use Phprest\Service;

class Index extends \Phprest\Util\Controller
{
    use Service\Orm\Getter;

    public function post(Request $request)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->serviceOrm();
    }
}
```

# Cli

You can use a helper script if you want after a composer install (```vendor/bin/phprest-service-orm```).

You have to provide an orm config for the script. You have two options for this:
* Put your orm configuration to a specific file: ```app/config/orm.php```
 * You have to return with the orm configuration in the proper file
* Put the path of the configuration in the ```paths.php``` file
 * You have to return with an array from the ```paths.php``` file with the orm configuration file path under the ```service.orm.config``` array key
