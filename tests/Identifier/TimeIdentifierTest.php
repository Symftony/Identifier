<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\TimeIdentifier;

class TimeIdentifierTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $suffix
     * @param $expectedName
     */
    public function testSuccess($suffix, $expectedName)
    {
        $timeIdentifier = new TimeIdentifier($suffix);
        $this->assertRegExp('/^\d{10}$/', $timeIdentifier->getIdentifier());
        $this->assertRegExp('/^\d{10}$/', (string)$timeIdentifier);
        $this->assertEquals($expectedName, $timeIdentifier->getName());
    }

    public function dataProvider()
    {
        return [
            [
                null,
                'time',
            ],
            [
                'fake',
                'time_fake',
            ],
        ];
    }
}
