<?php

namespace Symftony\Identifier;

use Ramsey\Uuid\Uuid;

class Uuid5Identifier extends AbstractIdentifier
{
    public function __construct($ns, $name)
    {
        $this->identifier = Uuid::uuid5($ns, $name)->toString();
    }

    public function getName()
    {
        return 'uuid_5';
    }
}
