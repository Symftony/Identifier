<?php

namespace Symftony\Identifier;

use Ramsey\Uuid\Uuid;

class Uuid3Identifier extends AbstractIdentifier
{
    public function __construct($ns, $name)
    {
        $this->identifier = Uuid::uuid3($ns, $name)->toString();
    }

    public function getName()
    {
        return 'uuid_3';
    }
}
