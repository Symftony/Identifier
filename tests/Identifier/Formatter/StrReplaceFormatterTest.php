<?php

namespace Symftony\Identifier\Tests\Identifier\Formatter;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\Formatter\StrReplaceFormatter;
use Symftony\Identifier\IdentifierInterface;

class StrReplaceFormatterTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $defaultFormat
     * @param $format
     * @param $identifiers
     * @param $expected
     */
    public function testFormat($defaultFormat, $format, $identifiers, $expected)
    {
        $implodeFormatter = new StrReplaceFormatter($defaultFormat);

        $this->assertEquals($expected, $implodeFormatter->format($format, $identifiers));
    }

    public function dataProvider()
    {
        $identifier1 = $this->prophesize(IdentifierInterface::class);
        $identifier1->getIdentifier()->willReturn('(my fake identifier1)');
        $identifier1->getName()->willReturn('my_identifier1');

        $identifier2 = $this->prophesize(IdentifierInterface::class);
        $identifier2->getIdentifier()->willReturn('(my fake identifier2)');
        $identifier2->getName()->willReturn('my_identifier2');

        return [
            [
                null,
                null,
                [$identifier1->reveal()],
                '',
            ],
            [
                '_',
                null,
                [$identifier1->reveal()],
                '_',
            ],
            [
                null,
                '_',
                [$identifier1->reveal()],
                '_',
            ],
            [
                'before>>{my_identifier1}<<after',
                null,
                [$identifier1->reveal()],
                'before>>(my fake identifier1)<<after',
            ],
            [
                null,
                'before>>{my_identifier1}<<after',
                [$identifier1->reveal()],
                'before>>(my fake identifier1)<<after',
            ],
            [
                null,
                'before>>{my_identifier1}<<after',
                [$identifier1->reveal(), $identifier2->reveal()],
                'before>>(my fake identifier1)<<after',
            ],
            [
                null,
                'before>>{my_identifier2}<<after',
                [$identifier1->reveal(), $identifier2->reveal()],
                'before>>(my fake identifier2)<<after',
            ],
            [
                null,
                'before>>{my_identifier2}--{my_identifier1}<<after',
                [$identifier1->reveal(), $identifier2->reveal()],
                'before>>(my fake identifier2)--(my fake identifier1)<<after',
            ],
            [
                null,
                'before>>{my_identifier2}--{my_identifier2}<<after',
                [$identifier1->reveal(), $identifier2->reveal()],
                'before>>(my fake identifier2)--(my fake identifier2)<<after',
            ],
        ];
    }
}
