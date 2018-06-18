<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\PHPUnameIdentifier;

class PHPUnameIdentifierTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $mode
     * @param $expectedName
     * @param $expected
     */
    public function testSuccess($mode, $expectedName, $expected)
    {
        $PHPUnameIdentifier = new PHPUnameIdentifier($mode);
        $this->assertEquals($expected, $PHPUnameIdentifier->getIdentifier());
        $this->assertEquals($expected, (string)$PHPUnameIdentifier);
        $this->assertEquals($expectedName, $PHPUnameIdentifier->getName());
    }

    public function dataProvider()
    {
        return [
            [
                null,
                'php_uname_a',
                php_uname('a'),
            ],
            [
                'sn',
                'php_uname_sn',
                php_uname('sn'),
            ],
            [
                'rvm',
                'php_uname_rvm',
                php_uname('rvm'),
            ],
        ];
    }
}
