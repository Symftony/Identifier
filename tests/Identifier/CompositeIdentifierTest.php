<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\CompositeIdentifier;
use Symftony\Identifier\Formatter\FormatterInterface;
use Symftony\Identifier\IdentifierInterface;

class CompositeIdentifierTest extends TestCase
{
    /**
     * @var IdentifierInterface
     */
    private $identifier1Mock;

    /**
     * @var IdentifierInterface
     */
    private $identifier2Mock;

    public function setUp()
    {
        $this->identifier1Mock = $this->prophesize(IdentifierInterface::class);
        $this->identifier1Mock->getIdentifier()->willReturn('(fake_identifier_1)');
        $this->identifier1Mock->getName()->willReturn('fake_identifier_1');

        $this->identifier2Mock = $this->prophesize(IdentifierInterface::class);
        $this->identifier2Mock->getIdentifier()->willReturn('(fake_identifier_2)');
        $this->identifier2Mock->getName()->willReturn('fake_identifier_2');
    }

    public function testGetIdentifiers()
    {
        $compositeIdentifier = new CompositeIdentifier([
            $this->identifier1Mock->reveal(),
            $this->identifier2Mock->reveal()
        ]);
        $this->assertEquals(
            [
                'fake_identifier_1' => $this->identifier1Mock->reveal(),
                'fake_identifier_2' => $this->identifier2Mock->reveal(),
            ],
            $compositeIdentifier->getIdentifiers()
        );
    }

    public function testGetIterator()
    {
        $compositeIdentifier = new CompositeIdentifier([
            $this->identifier1Mock->reveal(),
            $this->identifier2Mock->reveal()
        ]);

        $this->assertEquals(
            new \ArrayIterator([
                'fake_identifier_1' => $this->identifier1Mock->reveal(),
                'fake_identifier_2' => $this->identifier2Mock->reveal(),
            ]),
            $compositeIdentifier->getIterator()
        );
    }

    public function testGetIdentifier()
    {
        $compositeIdentifier = new CompositeIdentifier([
            $this->identifier1Mock->reveal(),
            $this->identifier2Mock->reveal()
        ]);
        $this->assertEquals('(fake_identifier_1)(fake_identifier_2)', $compositeIdentifier->getIdentifier());
        $this->assertEquals('(fake_identifier_1)(fake_identifier_2)', (string)$compositeIdentifier);
        $this->assertEquals('composite', $compositeIdentifier->getName());
    }

    public function testGetIdentifierWithDefaultFormatter()
    {
        $formatterMock = $this->prophesize(FormatterInterface::class);
        $formatterMock
            ->format(null, [
                'fake_identifier_1' => $this->identifier1Mock->reveal(),
                'fake_identifier_2' => $this->identifier2Mock->reveal()
            ])
            ->willReturn('fake_formatted_result')
            ->shouldBeCalled();

        $compositeIdentifier = new CompositeIdentifier([
            $this->identifier1Mock->reveal(),
            $this->identifier2Mock->reveal()
        ]);
        $compositeIdentifier->setDefaultFormatter($formatterMock->reveal());

        $this->assertEquals('fake_formatted_result', $compositeIdentifier->getIdentifier());
        $this->assertEquals('fake_formatted_result', (string)$compositeIdentifier);
        $this->assertEquals('composite', $compositeIdentifier->getName());
    }

    public function testAddIdentifier()
    {
        $compositeIdentifier = new CompositeIdentifier([$this->identifier1Mock->reveal()]);
        $this->assertEquals('(fake_identifier_1)', $compositeIdentifier->getIdentifier());
        $compositeIdentifier->add($this->identifier2Mock->reveal());
        $this->assertEquals('(fake_identifier_1)(fake_identifier_2)', (string)$compositeIdentifier);
        $this->assertEquals('composite', $compositeIdentifier->getName());
    }
}
