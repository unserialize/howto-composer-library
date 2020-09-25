# Demo of a composer package (how to)

This repo shows, how to create and maintain a composer package (without publishing to packagist). 


## What does this package do

It exports 2 PHP functions: *packInteger()* and *unpackInteger()*. They call *MessagePack* internally as a dependency.


## How to install and use this package

* In a PHP project, create `composer.json` with the following contents (if exists, manually merge):  
```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/unserialize/howto-composer-library"
    }
  ],
  "require": {
    "unserialize/howto-composer-library": "1.1"
  }
}
```

* Run `composer install`; ensure that *vendor/* folder contains this lib.

* Create `1.php`, add
```php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/unserialize/howto-composer-library/exported-functions.php';

echo unpackInteger(packInteger(42)), "\n";
``` 

* `php -f 1.php` — and ensure, that "42" is printed


## How to maintain a composer package (this package)

Take a look at [composer.json](./composer.json):
* it contains **name** (that's what you *require* in your *composer.json* to use it)
* it contains **depends** (*rybakit/msgpack* here) 
* it contains **autoload rules** for internal classes ([src/](src) folder maps to *DummyNamespace\\* here)

Composer is also used while developing, just *vendor/* folder is in *.gitignore*.

When you install this lib with composer, it automatically rules all sub-dependencies and autoloads.  

This lib exports **functions** (not classes), that's why you need to *require_once* a file manually.  
You can also call *DummyClass::* methods. They are considered as internal implementation, but still.

**Versioning** is done via **git tags**. This repo has *v1.0* and *v1.1* tags. 
