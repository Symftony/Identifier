<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\HostByNameIdentifier;

class HostByNameIdentifierTest extends TestCase
{
    /**
     * @var HostByNameIdentifier
     */
    private $hostByNameIdentifier;

    public function setUp()
    {
        $this->hostByNameIdentifier = new HostByNameIdentifier();
    }

    public function testSuccess()
    {
        $this->assertEquals(gethostbyname(gethostname()), $this->hostByNameIdentifier->getIdentifier());
        $this->assertEquals(gethostbyname(gethostname()), (string) $this->hostByNameIdentifier);
    }

    public function testGetName()
    {
        $this->assertEquals('host_by_name', $this->hostByNameIdentifier->getName());
    }
}
