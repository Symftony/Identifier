<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\PHPOSIdentifier;

class PHPOSIdentifierTest extends TestCase
{
    /**
     * @var PHPOSIdentifier
     */
    private $PHPOSIdentifier;

    public function setUp()
    {
        $this->PHPOSIdentifier = new PHPOSIdentifier();
    }

    public function testSuccess()
    {
        $this->assertEquals(PHP_OS, $this->PHPOSIdentifier->getIdentifier());
        $this->assertEquals(PHP_OS, (string) $this->PHPOSIdentifier);
    }

    public function testGetName()
    {
        $this->assertEquals('php_os', $this->PHPOSIdentifier->getName());
    }
}
