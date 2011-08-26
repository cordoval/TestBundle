##TestBundle
TestBundle is a TDD Bundle which integrates the PHPSpec, PHPUnit, and Behat frameworks into one.
It is created to foster the BDD methodology into Symfony2 app development.

#Instructions

// AppKernel.php
```php
new Cordova\Bundle\TestBundle\CordovaTestBundle(),
```

```php
// autoload.php
    'Cordova'          => __DIR__.'/../vendor/bundles',
```

```sh
// deps
[PHPAutotest]
    git=https://github.com/Programania/PHPAutotest.git
    target=/PHPAutotest

[TestBundle]
    git=https://github.com/cordoval/TestBundle.git
    target=/bundles/Cordova/Bundle/TestBundle
```

```sh
// creates autotest.phar
cd vendor/PHPAutotest
./compile
```

#Usage
```sh
php app/console test:auto vendor/PHPAutotest/demo/Behat/features/minesweeper.feature
```

More tips:
http://www.craftitonline.com

#License

See License.txt file included in bundle folder.