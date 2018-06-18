<?php

namespace Symftony\Identifier;

use Ramsey\Uuid\Uuid;

class Uuid1Identifier extends AbstractIdentifier
{
    public function __construct($node = null, $clockSeq = null)
    {
        $this->identifier = Uuid::uuid1($node, $clockSeq)->toString();
    }

    public function getName()
    {
        return 'uuid_1';
    }
}
