<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\Uuid4Identifier;

class Uuid4IdentifierTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $expectedName
     * @param $expectedPattern
     */
    public function testSuccess($expectedName, $expectedPattern)
    {
        $timeIdentifier = new Uuid4Identifier();
        $this->assertRegExp($expectedPattern, $timeIdentifier->getIdentifier());
        $this->assertRegExp($expectedPattern, (string)$timeIdentifier);
        $this->assertEquals($expectedName, $timeIdentifier->getName());
    }

    public function dataProvider()
    {
        return [
            [
                'uuid_4',
                '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/',
            ],
            [
                'uuid_4',
                '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/',
            ],
            [
                'uuid_4',
                '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/',
            ],
        ];
    }
}
