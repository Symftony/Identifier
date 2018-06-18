<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\MyUidIdentifier;

class MyUidIdentifierTest extends TestCase
{
    /**
     * @var MyUidIdentifier
     */
    private $myUidIdentifier;

    public function setUp()
    {
        $this->myUidIdentifier = new MyUidIdentifier();
    }

    public function testSuccess()
    {
        $this->assertEquals(getmyuid(), $this->myUidIdentifier->getIdentifier());
        $this->assertEquals(getmyuid(), (string) $this->myUidIdentifier);
    }

    public function testGetName()
    {
        $this->assertEquals('my_uid', $this->myUidIdentifier->getName());
    }
}
