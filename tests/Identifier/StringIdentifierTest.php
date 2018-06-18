<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\StringIdentifier;

class StringIdentifierTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $string
     * @param $suffix
     * @param $expectedName
     * @param $expected
     */
    public function testSuccess($string, $suffix, $expectedName, $expected)
    {
        $stringIdentifier = new StringIdentifier($string, $suffix);
        $this->assertEquals($expected, $stringIdentifier->getIdentifier());
        $this->assertEquals($expected, (string) $stringIdentifier);
        $this->assertEquals($expectedName, $stringIdentifier->getName());
    }

    public function dataProvider()
    {
        return [
            [
                '',
                null,
                'string',
                '',
            ],
            [
                'fake',
                null,
                'string',
                'fake',
            ],
            [
                'fake',
                'end',
                'string_end',
                'fake',
            ],
        ];
    }
}
