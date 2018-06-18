<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\HostnameIdentifier;

class HostnameIdentifierTest extends TestCase
{
    /**
     * @var HostnameIdentifier
     */
    private $hostnameIdentifier;

    public function setUp()
    {
        $this->hostnameIdentifier = new HostnameIdentifier();
    }

    public function testSuccess()
    {
        $this->assertEquals(gethostname(), $this->hostnameIdentifier->getIdentifier());
        $this->assertEquals(gethostname(), (string) $this->hostnameIdentifier);
    }

    public function testGetName()
    {
        $this->assertEquals('hostname', $this->hostnameIdentifier->getName());
    }
}
