<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\UniqidIdentifier;

class UniqidIdentifierTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $prefix
     * @param $entropy
     * @param $suffix
     * @param $expectedName
     * @param $expectedPattern
     */
    public function testSuccess($prefix, $entropy, $suffix, $expectedName, $expectedPattern)
    {
        $timeIdentifier = new UniqidIdentifier($prefix, $entropy, $suffix);
        $this->assertRegExp($expectedPattern, $timeIdentifier->getIdentifier());
        $this->assertRegExp($expectedPattern, (string)$timeIdentifier);
        $this->assertEquals($expectedName, $timeIdentifier->getName());
    }

    public function dataProvider()
    {
        return [
            [
                null,
                null,
                null,
                'uniqid',
                '/^[0-9a-z]{13}$/',
            ],
            [
                null,
                true,
                null,
                'uniqid',
                '/^[0-9a-z.]{23}$/',
            ],
            [
                'prefix',
                null,
                null,
                'uniqid',
                '/^prefix[0-9a-z.]{13}$/',
            ],
            [
                'prefix',
                null,
                'suffixe',
                'uniqid_suffixe',
                '/^prefix[0-9a-z.]{13}$/',
            ],
        ];
    }
}
