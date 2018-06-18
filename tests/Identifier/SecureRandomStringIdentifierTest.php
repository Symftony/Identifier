<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\SecureRandomStringIdentifier;

class SecureRandomStringIdentifierTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $length
     * @param $keyspace
     * @param $suffix
     * @param $nameExpected
     * @param $patternExpected
     */
    public function testSuccess($length, $keyspace, $suffix, $nameExpected, $patternExpected)
    {
        $secureRandomStringIdentifier = new SecureRandomStringIdentifier($length, $keyspace, $suffix);
        $this->assertRegExp($patternExpected, $secureRandomStringIdentifier->getIdentifier());
        $this->assertRegExp($patternExpected, (string)$secureRandomStringIdentifier);
        $this->assertEquals($nameExpected, $secureRandomStringIdentifier->getName());
    }

    public function dataProvider()
    {
        return [
            [
                null,
                null,
                null,
                'secure_random_string',
                '/^[0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ]{8}$/',
            ],
            [
                12,
                null,
                null,
                'secure_random_string',
                '/^[0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ]{12}$/',
            ],
            [
                null,
                '56789abcdef',
                null,
                'secure_random_string',
                '/^[56789abcdef]{8}$/',
            ],
            [
                null,
                null,
                'fake',
                'secure_random_string_fake',
                '/^[0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ]{8}$/',
            ],
            [
                12,
                'stuvwxyzABCDEFG',
                'fake',
                'secure_random_string_fake',
                '/^[stuvwxyzABCDEFG]{12}$/',
            ],
        ];
    }
}
