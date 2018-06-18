<?php

namespace Symftony\Identifier\Tests\Identifier\Formatter;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\Formatter\ImplodeFormatter;
use Symftony\Identifier\IdentifierInterface;

class ImplodeFormatterTest extends TestCase
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
        $implodeFormatter = new ImplodeFormatter($defaultFormat);

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
                '(my fake identifier1)',
            ],
            [
                '-',
                '_',
                [$identifier1->reveal()],
                '(my fake identifier1)',
            ],
            [
                null,
                null,
                [$identifier1->reveal(), $identifier2->reveal()],
                '(my fake identifier1)(my fake identifier2)',
            ],
            [
                '-',
                null,
                [$identifier1->reveal(), $identifier2->reveal()],
                '(my fake identifier1)-(my fake identifier2)',
            ],
            [
                null,
                '-',
                [$identifier1->reveal(), $identifier2->reveal()],
                '(my fake identifier1)-(my fake identifier2)',
            ],
            [
                'fake',
                '-',
                [$identifier1->reveal(), $identifier2->reveal()],
                '(my fake identifier1)-(my fake identifier2)',
            ],
        ];
    }
}
