<?php

namespace App;

use Symftony\Identifier\CompositeIdentifier;
use Symftony\Identifier\Formatter\StrReplaceFormatter;
use Symftony\Identifier\Formatter\VsprintfFormatter;
use Symftony\Identifier\HostByNameIdentifier;
use Symftony\Identifier\PHPSapiNameIdentifier;
use Symftony\Identifier\PHPVersionIdentifier;
use Symftony\Identifier\UniqidIdentifier;

require_once __DIR__ . '/../vendor/autoload.php';

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
