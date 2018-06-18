<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\PHPVersionIdIdentifier;

class PHPVersionIdIdentifierTest extends TestCase
{
    /**
     * @var PHPVersionIdIdentifier
     */
    private $PHPVersionIdIdentifier;

    public function setUp()
    {
        $this->PHPVersionIdIdentifier = new PHPVersionIdIdentifier();
    }

    public function testSuccess()
    {
        $this->assertEquals(PHP_VERSION_ID, $this->PHPVersionIdIdentifier->getIdentifier());
        $this->assertEquals(PHP_VERSION_ID, (string) $this->PHPVersionIdIdentifier);
    }

    public function testGetName()
    {
        $this->assertEquals('php_version_id', $this->PHPVersionIdIdentifier->getName());
    }
}
