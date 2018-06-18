<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\MyGidIdentifier;

class MyGidIdentifierTest extends TestCase
{
    /**
     * @var MyGidIdentifier
     */
    private $myGidIdentifier;

    public function setUp()
    {
        $this->myGidIdentifier = new MyGidIdentifier();
    }

    public function testSuccess()
    {
        $this->assertEquals(getmygid(), $this->myGidIdentifier->getIdentifier());
        $this->assertEquals(getmygid(), (string) $this->myGidIdentifier);
    }

    public function testGetName()
    {
        $this->assertEquals('my_gid', $this->myGidIdentifier->getName());
    }
}
