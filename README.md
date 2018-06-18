## Identifier

A simple library to generate simple or complex identifier.

## Installation

The recommended way to install **Identifier** is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

```bash
php composer require symftony/identifier
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

## Documentation

This library provide:

- a lot of simple identifiers
- a composite identifier
- many formatter

## Identifiers

- Machine identifiers
    - [HostByNameIdentifier](src/Identifier/HostByNameIdentifier.php) (base on [gethostbyname](http://php.net/gethostbyname))
    - [HostnameIdentifier](src/Identifier/HostnameIdentifier.php) (base on [gethostname](http://php.net/gethostname))
    - [MyPidIdentifier](src/Identifier/MyPidIdentifier.php) (base on [getmypid](http://php.net/getmypid))
    - [PHPOSIdentifier](src/Identifier/PHPOSIdentifier.php) (base on [PHP_OS](http://php.net/manual/fr/reserved.constants.php#constant.php-os))
    - [PHPUnameIdentifier](src/Identifier/PHPUnameIdentifier.php) (base on [php_uname](http://php.net/php_uname))
- Configuration identifiers
    - [PHPSapiNameIdentifier](src/Identifier/PHPSapiNameIdentifier.php) (base on [php_sapi_name](http://php.net/php_sapi_name))
    - [PHPVersionIdentifier](src/Identifier/PHPVersionIdentifier.php) (base on [php_version](http://php.net/php_version))
    - [PHPVersionIdIdentifier](src/Identifier/PHPVersionIdIdentifier.php) (base on [PHP_VERSION_ID](http://php.net/manual/fr/reserved.constants.php#constant.php-version-id))
- Filesystem identifiers
    - [MyGidIdentifier](src/Identifier/MyGidIdentifier.php) (base on [getmygid](http://php.net/getmygid))
    - [MyUidIdentifier](src/Identifier/MyUidIdentifier.php) (base on [getmyuid](http://php.net/getmyuid))
- Unique identifiers
    - [SecureRandomStringIdentifier](src/Identifier/SecureRandomStringIdentifier.php)
    - [TimeIdentifier](src/Identifier/TimeIdentifier.php) (base on [time](http://php.net/time))
    - [UniqidIdentifier](src/Identifier/UniqidIdentifier.php) (base on [uniqid](http://php.net/uniqid))
    - [Uuid1Identifier](src/Identifier/Uuid1Identifier.php) (base on [ramsey/uuid](https://github.com/ramsey/uuid) V1)
    - [Uuid3Identifier](src/Identifier/Uuid3Identifier.php) (base on [ramsey/uuid](https://github.com/ramsey/uuid) V3)
    - [Uuid4Identifier](src/Identifier/Uuid4Identifier.php) (base on [ramsey/uuid](https://github.com/ramsey/uuid) V4)
    - [Uuid5Identifier](src/Identifier/Uuid5Identifier.php) (base on [ramsey/uuid](https://github.com/ramsey/uuid) V5)
- other
    - [StringIdentifier](src/Identifier/String.php) (inject your own string as identifier)
    - [CompositeIdentifier](src/Identifier/CompositeIdentifier.php) (compose with other identifiers)

## Formatters

- [ImplodeFormatter](src/Identifier/Formatter/ImplodeFormatter.php) (base on [implode](http://php.net/implode))
- [StrReplaceFormatter](src/Identifier/Formatter/StrReplaceFormatter.php) (base on [str_replace](http://php.net/str_replace))
- [VsprintfFormatter](src/Identifier/Formatter/VsprintfFormatter.php) (base on [vsprintf](http://php.net/vsprintf))

## Usage

If you want to identify the machine with the sapi and phpversion and a uniqID 

```php
<?php
use Symftony\Identifier\Formatter\VsprintfFormatter;
use Symftony\Identifier\Formatter\StrReplaceFormatter;
use Symftony\Identifier\CompositeIdentifier;
use Symftony\Identifier\HostByNameIdentifier;
use Symftony\Identifier\PHPSapiNameIdentifier;
use Symftony\Identifier\PHPVersionIdentifier;
use Symftony\Identifier\UniqidIdentifier;

$identifier = new CompositeIdentifier(
    new HostByNameIdentifier(),
    new PHPSapiNameIdentifier(),
    new PHPVersionIdentifier(),
    new UniqidIdentifier()
);
// create a format
$format1 = new VsprintfFormatter('%s@%s(php-%s)#%s');
$format2 = new StrReplaceFormatter('{host_by_name}@{php_sapi_name}(php-{php_version})#{uniqid}');

// CompositeIdentifier use ImplodeFormatter by default
echo $identifier;// 192.168.1.12_cli_7.2.5_5b2779e6098ca
echo $identifier->getIdentifier();// 192.168.1.12_cli_7.2.5_5b2779e6098ca
echo $identifier->getIdentifier($format1);// 192.168.1.12@cli(php-7.2.5)#5b2779e6098ca
echo $identifier->getIdentifier($format2);// 192.168.1.12@cli(php-7.2.5)#5b2779e6098ca
```

## Todo


Identifier builder/factory in order to easily create composite identifier with default format.
See how to regenerate the identifier that can changed (time/unique ...)
