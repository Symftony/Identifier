<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\PHPSapiNameIdentifier;

class PHPSapiNameIdentifierTest extends TestCase
{
    /**
     * @var PHPSapiNameIdentifier
     */
    private $PHPSapiNameIdentifier;

    public function setUp()
    {
        $this->PHPSapiNameIdentifier = new PHPSapiNameIdentifier();
    }

    public function testSuccess()
    {
        $this->assertEquals(php_sapi_name(), $this->PHPSapiNameIdentifier->getIdentifier());
        $this->assertEquals(php_sapi_name(), (string) $this->PHPSapiNameIdentifier);
    }

    public function testGetName()
    {
        $this->assertEquals('php_sapi_name', $this->PHPSapiNameIdentifier->getName());
    }
}
