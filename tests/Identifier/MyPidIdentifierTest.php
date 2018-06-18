<?php

namespace Symftony\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Symftony\Identifier\MyPidIdentifier;

class MyPidIdentifierTest extends TestCase
{
    /**
     * @var MyPidIdentifier
     */
    private $myPidIdentifier;

    public function setUp()
    {
        $this->myPidIdentifier = new MyPidIdentifier();
    }

    public function testSuccess()
    {
        $this->assertEquals(getmypid(), $this->myPidIdentifier->getIdentifier());
        $this->assertEquals(getmypid(), (string) $this->myPidIdentifier);
    }

    public function testGetName()
    {
        $this->assertEquals('my_pid', $this->myPidIdentifier->getName());
    }
}
