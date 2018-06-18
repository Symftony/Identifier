<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\Uuid1Identifier;

class Uuid1IdentifierTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $node
     * @param $clockSec
     * @param $expectedName
     * @param $expectedPattern
     */
    public function testSuccess($node, $clockSec, $expectedName, $expectedPattern)
    {
        $timeIdentifier = new Uuid1Identifier($node, $clockSec);
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
                'uuid_1',
                '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/',
            ],
            [
                0x0800200c9a66,
                0x1669,
                'uuid_1',
                '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/',
            ],
            [
                '7160355e',
                0x1669,
                'uuid_1',
                '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/',
            ],
        ];
    }
}
