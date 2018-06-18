<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\Uuid5Identifier;

class Uuid5IdentifierTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $ns
     * @param $name
     * @param $expectedName
     * @param $expectedPattern
     */
    public function testSuccess($ns, $name, $expectedName, $expectedPattern)
    {
        $timeIdentifier = new Uuid5Identifier($ns, $name);
        $this->assertRegExp($expectedPattern, $timeIdentifier->getIdentifier());
        $this->assertRegExp($expectedPattern, (string)$timeIdentifier);
        $this->assertEquals($expectedName, $timeIdentifier->getName());
    }

    public function dataProvider()
    {
        return [
            [
                '6ba7b810-9dad-11d1-80b4-00c04fd430c8',
                null,
                'uuid_5',
                '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/',
            ],
            [
                '6ba7b810-9dad-11d1-80b4-00c04fd430c8',
                'fake',
                'uuid_5',
                '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/',
            ],
            [
                '6ba7b811-9dad-11d1-80b4-00c04fd430c8',
                'fake',
                'uuid_5',
                '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/',
            ],
        ];
    }
}
